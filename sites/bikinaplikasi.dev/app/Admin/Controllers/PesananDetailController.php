<?php

namespace App\Admin\Controllers;

use App\Models\PesananDetail;
use App\Models\User;
use Doctrine\DBAL\Schema\Schema;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PesananDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PesananDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new PesananDetail();
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
        $grid->column('pesanan_id', __('Pesanan id'));
        $grid->column('produk.nama', __('Produk id'));
        $grid->column('jumlah', __('Jumlah'));
        $grid->column('harga', __('Harga'));
        $grid->column('total', __('Total'));

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
        $show = new Show(PesananDetail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pesanan_id', __('Pesanan id'));
        $show->field('produk.nama', __('Produk id'));
        $show->field('jumlah', __('Jumlah'));
        $show->field('harga', __('Harga'));
        $show->field('total', __('Total'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PesananDetail());

        $form->number('pesanan_id', __('Pesanan id'));
        $form->select('produk_id', __('Produk id'))->options(Produk::pluck('nama', 'id')->toArray());;
        $form->switch('jumlah', __('Jumlah'));
        $form->number('harga', __('Harga'));
        $form->number('total', __('Total'));

        return $form;
    }
}
