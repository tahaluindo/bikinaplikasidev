<?php

namespace App\Admin\Controllers;

use App\Models\AdminUser;
use App\Models\AkunPembayaran;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Produk;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Parent_;

class PembayaranController extends AdminController
{

    public function index(Content $content)
    {

        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());

        \View::share('total_penarikan', Pembayaran::where('user_admin_id', \Admin::user()->id)->where('status', 'Dibayar')->sum('jumlah'));
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pembayaran';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Pembayaran();
        $grid = new Grid($model);

        $grid->filter(function ($filter) use ($model) {
            // Remove the default id filter
            $filter->disableIdFilter();

            $filter->where(function ($query) use ($model) {
                collect(Schema::getColumnListing($model->getTable()))->except([0])->each(function ($column) use ($query) {

                    $query->orWhere($column, 'like', "%{$this->input}%");
                });
            }, 'Pencarian');
        });

        $grid->column('id', __('Id'));
        $grid->column('admin_user.name', __('Pemilik'));
        $grid->column('akun_pembayaran.no_akun', __('Akun pembayaran id'));
        $grid->column('jumlah', __('Jumlah'))->display(function ($item) {

            return toIdr($item);
        });

        $grid->column('status', __('Status'))->display(function ($item) {
            if ($item == 'Menunggu Verifikasi') {

                return "Menunggu Verifikasi, (Buka Emailmu)";
            }

            return $item;
        });

        $grid->column('created_at', __('Created at'));

        // Kalo yg login pelanggan
        if ($this->getPermission() == 'Pelanggan') {
            $grid->disableCreateButton()
                ->disableExport()
                ->disableColumnSelector()
                ->disableFilter()
                ->disableRowSelector()
                ->disableExport()
                ->actions(function ($actions) {

                    $actions->disableEdit();
                    $actions->disableDelete();
                });
            
            $grid->disableActions(true);
            $grid->model()->where('user_admin_id', \Admin::user()->id);
        }

        \View::share('total_penarikan', Pembayaran::where('user_admin_id', \Admin::user()->id)->where('status', 'Dibayar')->sum('jumlah'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Pembayaran::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('admin_user.name', __('Pemilik'));
        $show->field('akun_pembayaran.no_akun', __('Akun pembayaran id'));
        $show->field('jumlah', __('Jumlah'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));

        \View::share('total_penarikan', Pembayaran::where('user_admin_id', \Admin::user()->id)->where('status', 'Dibayar')->sum('jumlah'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Pembayaran());

        $akun_pembayaran = AkunPembayaran::where('user_admin_id', \Admin::user()->id)->get()->map(function ($item) {
            $item->nama_akun = "$item->no_akun ($item->nama_akun)";

            return $item;
        })->pluck('nama_akun', 'id')->toArray();

        $form->select('akun_pembayaran_id', __('Akun Pembayaran id'))->options($akun_pembayaran);
        $form->number('jumlah', __('Jumlah'))->value(100000);

        if ($this->getPermission() == 'Admin') {
            $form->number('jumlah', __('Jumlah'))->min(env('APP_MIN_PENARIKAN'))->max($total_penarikan)->value(100000);

            $form->select('pelanggan_id', __('Pelanggan id'))->options(AdminUser::whereIn('id', AdminUser::pluck('id')->toArray())->get()->map(function ($v) {
                $v->pelanggan_id = $v->pelanggan->id;

                return $v;
            })->pluck('name', 'pelanggan_id')->toArray());

            $form->select('status', __('Status'))->options([
                'Menunggu Persetujuan', 'Dibayar', 'Ditolak', 'Refund'
            ]);
        }

        \View::share('total_penarikan', Pembayaran::where('user_admin_id', \Admin::user()->id)->where('status', 'Dibayar')->sum('jumlah'));

        return $form;
    }

    public function getPermission()
    {

        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }

    public function store()
    {
        // cek maksimal penarikan yang sudah dia buat
        if (Pembayaran::where('user_admin_id', \Admin::user()->id)->where('status', 'Menunggu Persetujuan')->count() >= 2) {

            admin_toastr('Maksimal 2x penarikan berurut', 'error');

            return redirect()->back();
        }

        $validator = \Validator::make(request()->all(), [
            'akun_pembayaran_id' => 'required|exists:akun_pembayaran,id',
            'jumlah' => 'required|integer|gte:' . env('APP_MIN_PENARIKAN') . '|max:' . \Admin::user()->saldo
        ]);

        if ($validator->fails()) {

            admin_toastr('Gagal mengajukan penarikan, periksa kembali. ' . $validator->errors()->first(), 'error');

            return redirect()->back();
        }

        \DB::transaction(function () {
            // kirimkan link verifikasi permintaan pembayaran ke email pelanggan
            $token = encrypt(\Admin::user()->id . time() . csrf_token());
            $link_verifikasi_permintaan_pembayaran = secure_url('verifikasi_permintaan_pembayaran') . "?token=" . $token;
            $pembayaranCreate = Pembayaran::create([
                'user_admin_id' => \Admin::user()->id,
                'akun_pembayaran_id' => request()->akun_pembayaran_id,
                'jumlah' => request('jumlah'),
                'status' => 'Menunggu Verifikasi',
                'token' => $token
            ]);

            $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('ramdanriawan3@gmail.com')
                ->setPassword('mxoawcotxevinndd');
            $mailer = new \Swift_Mailer($transport);
            $message = (new \Swift_Message('Verifikasi Pembayaran'))
                ->setFrom(['ramdanriawan3@gmail.com' => 'Ramdan Riawan'])
                ->setTo([\Admin::user()->email])
                ->setBody("<h2>Verifikasi permintaan pembayaran</h2> Kamu melakukan permintaan pembayaran: <a href='$link_verifikasi_permintaan_pembayaran' target='_blank'>$link_verifikasi_permintaan_pembayaran</a>")
                ->setContentType('text/html');

            // Send the message
            try {
                $result = $mailer->send($message);
                AdminUser::findOrFail(\Admin::user()->id)->decrement('saldo', request('jumlah'));
                admin_toastr('Berhasil mengajukan penarikan, Buka email verifikasi!', 'success');
                return redirect()->route('admin.pembayaran.index');
            } catch (\Throwable $e) {
                admin_toastr("Gagal mengajukan permintaan pembayaran, contact admin. Error: {$e->getMessage()}", 'error');
                $pembayaranCreate->delete();

                return redirect()->route('admin.pembayaran.index');
            }
        });

        admin_toastr('Berhasil mengajukan penarikan, Buka email verifikasi!', 'success');
        return redirect()->route('admin.pembayaran.index');
    }

    public function verifikasi_permintaan_pembayaran()
    {
        if ($pembayaran = Pembayaran::where('token', request()->token)->first()) {
            $pembayaran->update([
                'status' => 'Menunggu Persetujuan',
                'token' => NULL
            ]);

            admin_toastr('Berhasil mengajukan penarikan, maks 2 hari / contact admin.', 'success');
            return redirect("/admin/pembayaran");
        }

        admin_toastr('Gagal mengajukan penarikan, maks 2 hari / contact admin.', 'error');
        return redirect("/admin/pembayaran");
    }
}
