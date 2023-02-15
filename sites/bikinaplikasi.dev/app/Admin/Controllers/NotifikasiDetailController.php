<?php

namespace App\Admin\Controllers;

use App\Models\NotifikasiDetail;
use App\Models\Produk;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class NotifikasiDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'NotifikasiDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new NotifikasiDetail();
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
        $grid->column('pelanggan.user.name', __('Pelanggan id'));
        $grid->column('status', __('Status'));

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
        $show = new Show(NotifikasiDetail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pelanggan.user.name', __('Pelanggan id'));
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
        $form = new Form(new NotifikasiDetail());

        $form->select('pelanggan_id', __('Pelanggan id'))->options(User::whereIn('id', Pelanggan::pluck('id')->toArray())->get()->map(function ($v) {
            $v->pelanggan_id = $v->pelanggan->id;
            
            return $v;
        })->pluck('name', 'pelanggan_id')->toArray());
        
        $form->select('status', __('Status'))->options([
            'Dibaca',
            'Belum Dibaca'
        ]);

        return $form;
    }
}
