<?php

namespace App\Admin\Controllers;

use App\Models\Produk;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class ProdukController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Produk';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Produk();
        $grid = new Grid($model);
                
        $grid->filter(function($filter) use($model) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->where(function($query) use ($model) {
                collect(Schema::getColumnListing($model->getTable()))->except([0])->each(function($column) use ($query) {
                    
                    $query->orWhere($column, 'like', "%{$this->input}%");
                });
            }, 'Pencarian');
        });

        $grid->column('id', __('Id'));
        $grid->column('nama', __('Nama'));
        $grid->column('harga', __('Harga'));
        $grid->column('harga_promo', __('Harga promo'));
        $grid->column('jumlah_angsuran', __('Jumlah angsuran'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('status', __('Status'));
        
        // Kalo yg login pelanggan
        if($this->getPermission() == 'Pelanggan')
        {
            $grid->disableCreateButton()
            ->disableExport()
            ->disableColumnSelector()
            ->disableFilter()
            ->disableRowSelector()
            ->disableExport()
            ->actions(function($actions) {
                
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
        $show = new Show(Produk::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $show->field('harga', __('Harga'));
        $show->field('harga_promo', __('Harga promo'));
        $show->field('jumlah_angsuran', __('Jumlah angsuran'));
        $show->field('deskripsi', __('Deskripsi'));
        $show->field('status', __('Status'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Produk());

        $form->text('nama', __('Nama'));
        $form->number('harga', __('Harga'));
        $form->number('harga_promo', __('Harga promo'));
        $form->switch('jumlah_angsuran', __('Jumlah angsuran'));
        $form->textarea('deskripsi', __('Deskripsi'));
        $form->select('status', __('Status'))->options(['Aktif', 'Tidak Aktif']);

        return $form;
    }
    
            
    public function getPermission()
    {
        
        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }
}
