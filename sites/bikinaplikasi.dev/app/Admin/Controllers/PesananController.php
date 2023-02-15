<?php

namespace App\Admin\Controllers;

use App\Models\AdminUser;
use App\Models\Angsuran;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\Rujukan;
use App\Models\Tripay;
use App\Models\User;
use App\Models\Voucher;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Livewire\Request;
use phpDocumentor\Reflection\Types\Parent_;

class PesananController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pesanan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // cek kalo seandainya ada detail transaksi yang mau dicek karena customer clik konfirmasi ke merchant
        if (request()->tripay_reference) {

            $detail_transaction = Tripay::detail_transaction(Angsuran::where('no', request()->tripay_merchant_ref)->get()->first(), request()->tripay_reference);

            if ($detail_transaction->success && $detail_transaction->data->status == 'PAID') {
                \DB::transaction(function () use ($detail_transaction) {
                    $angsuran = Angsuran::where('no', request()->tripay_merchant_ref)->get();
                    $angsuran->first()->update([
                        'status' => 'Dibayar'
                    ]);

                    if ($angsuran->first()->angsuran_ke == 2) {
                        // cek jika user adlah refferal dari orang maka tambahkan ke saldo orang tersebut, ini hanya untuk 1 pembelian saja
                        if ($rujukan = Rujukan::where('user_admin_id_r', $angsuran->first()->pesanan->user_id)->first()) {
                            $pesanan = Pesanan::find($angsuran->first()->pesanan_id);
                            $pesanan_detail = $pesanan->pesanan_detail;
                            $produk = $pesanan_detail->produk;
                            AdminUser::where('id', $rujukan->user_admin_id)->increment('saldo', $produk->bonus_rujukan ?? 0);
                        }

                        Pesanan::find($angsuran->first()->pesanan_id)->update([
                            'status' => 'Selesai'
                        ]);
                    }

                    // input detail callbacknya ke table tripay
                    Tripay::where('angsuran_id', $angsuran->first()->id)->update([

                        'callback_response' => json_encode($detail_transaction)
                    ]);
                });

                return redirect(route('admin.pesanan.index'));
            }
        }

        $model = new Pesanan();
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

            $grid->model()->where('user_id', \Admin::user()->id);
        }

//        $grid->column('id', __('Id'));
        $grid->column('no', __('No'));
        $grid->column('admin_user.name', __('Nama Pelanggan'));
        $grid->column('catatan', __('Catatan'))->display(function ($item) {

            return Str::limit($item, 25);
        });

        $grid->column('status', __('Status'))->display(function ($item) use ($grid) {

            if ($this->status == 'Belum Lunas') {
                $href = route('admin.pesanan.batalkan', $this->id);

                return $item . " <a href='$href' class='badge bg-danger' onclick='return confirm(\"Yakin akan membatalkan pesanan ini?\")'>Batalkan</a>";
            }

            return $item;
        });

        $grid->column('Produk', 'Produk')->modal('Detail Produk Yang Dibeli', function ($model) {
            $produk = Produk::findOrFail($model->pesanan_detail->produk_id);
            unset($produk->status);
            $produk->harga = $produk->harga ? toIdr($produk->harga) : '-';
            $produk->dp = $produk->dp ? toIdr($produk->dp) : '-';
            $produk->bonus_rujukan = $produk->bonus_rujukan ? toIdr($produk->bonus_rujukan) : '-';
            $produk->harga_promo = $produk->harga_promo ? toIdr($produk->harga_promo) : '-';

            return new Table(['id', 'Nama', 'Harga', 'Harga Promo', 'Bonus Rujukan', 'Angsuran', 'Dp', 'Deskripsi'], [$produk->toArray()]);
        })->display(function ($item) {

            return $item . " Lihat Produk >>>";
        });
        
        $grid->column('progress')->progressBar();

        $grid->column('Angsuran', 'Angsuran')->modal('Angsuran Pembayaran', function ($model) {
            $angsuran = $model->angsurans->map(function ($item) {
                $item->jumlah = $item->jumlah ? toIdr($item->jumlah) : '-';
                $item->created_at = \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i:s');
                $item->kode_voucher = $item->voucher_id ? Voucher::findOrFail($item->voucher_id)->kode_voucher : '-';

                if ($item->status == 'Belum Dibayar') {

                    $item->aksi = "<a clas='btn btn-sm btn-success' >-</a>";
                    if ($tripay = Tripay::where('angsuran_id', $item->id)->first()) {

                        $link_pembayaran = $tripay->payment_request_response->data->checkout_url;
                        $item->aksi = "<a href='$link_pembayaran' clas='btn btn-sm btn-success' target='_blank'>Bayar >></a>";

                        $expired_time = date("m-d H:i:s", $tripay->payment_request_response->data->expired_time) . " WIB";
                        $item->status .= "<span class='text-info'> (S/d {$expired_time} ) </span>";
                    }

                    if ($item->angsuran_ke == 2 && \Admin::user()->username == 'admin' && $tripay) {
                        if ($tripay = Tripay::where('angsuran_id', $item->id)->first()) {
                            $item->aksi = "<a clas='btn btn-sm btn-success text-success'>Pelunasan Dibuat</a>";
                        } else {
                            $link_pelunasan = route('admin.angsuran.pelunasan') . '?no=' . $item->no;
                            $item->aksi = "<a href='$link_pelunasan' clas='btn btn-sm btn-success' target='_blank'>Buat Pelunasan >></a>";
                        }
                    }
                } else {
                    $item->aksi = '-';
                }

                unset($item->id, $item->user_id, $item->updated_at, $item->pesanan_id, $item->created_at, $item->method, $item->voucher_id);

                return $item;
            });

            return new Table(['Ke', 'No', 'jumlah', 'Status', 'Kode Voucher', 'Aksi'], $angsuran->toArray());
        })->display(function ($item) {

            if ($this->status != 'Dibatalkan') {

                return $item . " Lihat / Bayarkan >>>";
            } else {
                return '-';
            }
        });
        
        

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
        $show = new Show(Pesanan::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('no', __('No'));
        $show->field('catatan', __('Catatan'));
        $show->field('admin_user.name', __('Nama Pelanggan'));
        $show->field('status', __('Status'));
        $show->field('progress', __('Progress'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Pesanan());

        $form->select('user_id', __('User id'))->options(AdminUser::pluck('name', 'id')->toArray());
        $form->text('no', __('No'));
        $form->select('status', __('Status'))->options(['Menunggu Persetujuan', 'Selesai', 'Berjalan', 'Dibatalkan', 'Refund']);
        $form->number('progress', __('Progress'));

        return $form;
    }

    public function getPermission()
    {

        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }

    public function store()
    {
        $method = ['MYBVA', 'PERMATAVA', 'BNIVA', 'BRIVA', 'MANDIRIVA', 'BCAVA', 'SMSVA', 'ALFAMART', 'QRIS'];
        $validator = \Validator::make(request()->all(), [
            'method' => 'required|in:' . implode(',', $method)
        ]);

        if ($validator->fails()) {

            admin_toastr('Methode pembayaran tidak valid!', 'error');

            return redirect('admin');
        }

        if ($this->getPermission() == 'Pelanggan') {
            $produk = Produk::findOrFail(request('id'));

            // untuk cek maximal cuman boleh 1x beli dan status belum lunas
            $pesananCount = Pesanan::where([
                'user_id' => \Admin::user()->id,
                'status' => 'Belum Lunas'
            ])->count();

            if ($pesananCount == env('APP_MAX_PESANAN_BELUM_LUNAS')) {
                admin_toastr('Kamu memiliki beberapa pesanan belum lunas!', 'error');

                return back();
            }

            // untuk cek voucher yang digunakan apakah sudah expired atau belum beserta limitnya, boleh digunakan untuk siapa, produk apa, dll.
            if ($voucher = Voucher::where('kode_voucher', \request('kode_voucher'))->first()) {
                if (now()->gte(\Carbon\Carbon::parse($voucher->expired_at))) {

                    admin_toastr('voucher sudah tidak berlaku!', 'error');

                    return redirect()->back();
                }

                $voucher_angsuran_count = Angsuran::where('voucher_id', $voucher->id)->count();

                if (($voucher->limit) && ($voucher_angsuran_count >= $voucher->limit)) {

                    admin_toastr('voucher sudah melewati limit!', 'error');

                    return redirect()->back();
                }

                if ($voucher->khusus_user) {
                    if (!in_array(\Admin::user()->id, explode(',', $voucher->khusus_user))) {
                        admin_toastr('voucher tidak bisa digunakan diakun ini!', 'error');

                        return redirect()->back();
                    }
                }

                if ($voucher->khusus_produk) {
                    if (!in_array($produk->id, explode(',', $voucher->khusus_produk))) {
                        admin_toastr('voucher tidak bisa digunakan diproduk ini!', 'error');

                        return redirect()->back();
                    }
                }
            }

            if (request()->kode_voucher) {
                if (!Voucher::where('kode_voucher', \request('kode_voucher'))->first()) {

                    admin_toastr('Kode voucher tidak valid!', 'error');

                    return redirect()->back();
                }
            }

            $angsuranCreate = null;
            \DB::transaction(function () use ($produk, &$angsuranCreate) {
                $pesananCreate = Pesanan::create([
                    'user_id' => \Admin::user()->id,
                    'no' => IdGenerator::generate(['field' => 'no', 'table' => 'pesanan', 'length' => 10, 'prefix' => 'PES']),
                    'catatan' => \request('catatan')
                ]);

                PesananDetail::create([
                    'pesanan_id' => $pesananCreate->id,
                    'produk_id' => $produk->id,
                    'jumlah' => 1,
                    'harga' => $produk->harga,
                    'total' => $produk->harga
                ]);

                $jumlah_angsuran_pertama = Voucher::getHarga(request()->kode_voucher, $produk->dp);
                $angsuranCreate = Angsuran::create([
                    'no' => IdGenerator::generate(['field' => 'no', 'table' => 'angsuran', 'length' => 10, 'prefix' => 'ANG']),
                    'user_id' => \Admin::user()->id,
                    'pesanan_id' => $pesananCreate->id,
                    'angsuran_ke' => 1,
                    'method' => request('method'),
                    'jumlah' => $jumlah_angsuran_pertama,
                    'voucher_id' => $jumlah_angsuran_pertama != $produk->dp ? Voucher::where('kode_voucher', request()->kode_voucher)->first()->id : NULL
                ]);

                Angsuran::create([
                    'no' => IdGenerator::generate(['field' => 'no', 'table' => 'angsuran', 'length' => 10, 'prefix' => 'ANG']),
                    'user_id' => \Admin::user()->id,
                    'pesanan_id' => $pesananCreate->id,
                    'angsuran_ke' => 2,
                    'method' => request('method'),
                    'jumlah' => ($produk->harga - $produk->dp)
                ])->save();

                // langsung buat angsuran pertama yg harus dibayarkan
                \App\Models\Tripay::closedTransaction($angsuranCreate, request('method'));
            });

            admin_toastr('Berhasil menambah data pesanan, segera lakukan pembayaran!');
            if ($tripay = Tripay::where('angsuran_id', $angsuranCreate->id)->first()) {

                $link_pembayaran = $tripay->payment_request_response->data->checkout_url;

                return redirect($link_pembayaran);
            }

            return redirect(route('admin.pesanan.index'));
        } else {

            parent::store();
        }
    }

    public function batalkan(Pesanan $pesanan)
    {
        $pesanan->update([
            'status' => 'Dibatalkan'
        ]);

        return redirect(route('admin.pesanan.index'));
    }
}
