<?php

namespace App\Admin\Controllers;

use App\Models\SumberKode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SumberKodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sumber Kode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SumberKode());

        $grid->column('nama_program', __('Nama program'));
        
        $grid->column('link', __('Link'))->display(function ($item) use ($grid) {
            $href = route('admin.sumber-kode.download') . "?path=$item";

            return "
                <a href='$href' class='text-success' download target='_blank'>
                    <i class='fa fa-download'></i>
                    Download
                </a>
            ";
        });
        $grid->column('berbayar', __('Berbayar'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        if ($this->getPermission() == 'Pelanggan') {
            $grid->disableCreateButton()
                ->disableExport()
                ->disableColumnSelector()
                ->disableFilter()
                ->disableRowSelector()
                ->disableExport()
                ->disableActions()
                ->actions(function ($actions) {

                    $actions->disableEdit();
                    $actions->disableDelete();
                });
        }

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
        $show = new Show(SumberKode::findOrFail($id));

        $show->field('nama_program', __('Nama program'));
        $show->field('link', __('Link'));
        $show->field('berbayar', __('Berbayar'));
        $show->field('deskripsi', __('Deskripsi'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SumberKode());

        $form->text('nama_program', __('Nama program'));
        $form->url('link', __('Link'));
        $form->file('file_program', __('File Program'));
        $form->select('berbayar', __('Berbayar'))->default('Tidak')->options(['Ya' => 'Ya', 'Tidak' => 'Tidak']);
        $form->textarea('deskripsi', __('Deskripsi'));

        return $form;
    }
    
    public function getPermission()
    {

        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }
    
    public function store()
    {
        ini_set('max_execution_time', 1000000);
        ini_set('memory_limit', '512M');

        if (SumberKode::where('nama_program', request()->nama_program)->first()) {

            admin_toastr('Program sudah ada', 'error');

            return redirect()->back('admin.sumber-kode.create');
        }

        $disk = Storage::disk('s3');
        $link = '';
        if (request()->link) {
            $link = str_replace("%20", "-", str_replace(' ', '-', basename(request()->link)));
            
            if (!$disk->put("programs/" . $link, fopen(request()->link, 'r'))) {

                admin_toastr('Gagal memindahkan program', 'error');

                return redirect()->back('admin.sumber-kode.create');
            }
        } else {
            $link = str_replace("%20", "-", str_replace(' ', '-', request()->file('file_program')->getClientOriginalName()));

            if (!$disk->put('programs/' . $link, request()->file('file_program')->getLinkTarget())) {

                admin_toastr('Gagal memindahkan program', 'error');

                return redirect()->back('admin.sumber-kode.create');
            }
        }

        SumberKode::create([
            'nama_program' => request()->nama_program,
            'link' => $link,
            'berbayar' => request()->berbayar,
            'deskripsi' => request()->deskripsi,
        ]);

        admin_toastr('Berhasil memindahkan program', 'success');

        return redirect()->route('admin.sumber-kode.index');
    }
    
    public function destroy($id)
    {
        $sumber_kode = SumberKode::find($id);
        
        $disk = Storage::disk('s3');
        $disk->delete('programs/' . $sumber_kode->link)->delete();
        $video->delete();
        
        admin_toastr('Berhasil menghapus program', 'success');

        header('location: ' . route('admin.sumber-kode.index'));
    }
    
    public function download(Request $request)
    {
        $disk = Storage::disk('s3');
        $file = $disk->temporaryUrl('programs/' . $request->path, now()->addMinutes(5));

        echo "<script>window.location.href = '$file'</script>";
    }
}
