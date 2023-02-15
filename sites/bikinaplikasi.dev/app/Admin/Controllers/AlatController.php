<?php

namespace App\Admin\Controllers;

use App\Models\Alat;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class AlatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Alat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Alat());

        $grid->column('id', __('Id'));
        $grid->column('nama', __('Nama'));
        $grid->column('link', __('Link'))->display(function ($item) use ($grid) {

            $href = route('admin.alat.view') . "?path=$item";

            return "
                <a href='$href' class='text-success'>
                    <i class='fa fa-eye'></i>
                    Lihat
                </a>
            ";
        });
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
        $show = new Show(Alat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $grid->column('link', __('Link'))->display(function ($item) use ($grid) {

            $href = route('admin.alat.view') . "?path=$item";

            return "
                <a href='$href' class='text-success'>
                    <i class='fa fa-eye'></i>
                    Lihat
                </a>
            ";
        });
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
        $form = new Form(new Alat());

        $form->text('nama', __('Nama'));
        $form->text('link', __('Link'));
        $form->text('deskripsi', __('Deskripsi'));

        return $form;
    }
    
    public function getPermission()
    {

        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
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

    public function view(Request $request)
    {

        return view("tanggal-lahir-detector.index");
    }
}
