<?php

namespace App\Admin\Controllers;

use App\Models\Informasi;
use App\Models\Produk;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class InformasiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Informasi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Informasi();
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
        $grid->column('judul', __('Judul'));
        $grid->column('isi', __('Isi'))->limit(25);

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
        $show = new Show(Informasi::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('judul', __('Judul'));
        $show->field('isi', __('Isi'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Informasi());

        $form->text('judul', __('Judul'));
        $form->textarea('isi', __('Isi'));

        return $form;
    }
}
