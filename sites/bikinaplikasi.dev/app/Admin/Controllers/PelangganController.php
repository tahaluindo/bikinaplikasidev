<?php

namespace App\Admin\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class PelangganController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pelanggan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Pelanggan();
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
        $grid->column('link_rujukan', __('Link rujukan'));
        $grid->column('saldo', __('Saldo'));

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
        $show = new Show(Pelanggan::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('link_rujukan', __('Link rujukan'));
        $show->field('saldo', __('Saldo'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Pelanggan());
        
        $form->select('user_id', 'User')->options(User::all()->pluck('name', 'id')->toArray());
        $form->url('link_rujukan', __('Link rujukan'))->placeholder('https://bikinaplikasi.dev/r/');
        $form->number('saldo', __('Saldo'))->default(0);

        return $form;
    }
}
