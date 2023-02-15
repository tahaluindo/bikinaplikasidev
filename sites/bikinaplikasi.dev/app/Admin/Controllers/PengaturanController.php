<?php

namespace App\Admin\Controllers;

use App\Models\Pengaturan;
use App\Models\Produk;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class PengaturanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pengaturan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Pengaturan();
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

        $grid->column('nama', __('Nama'));
        $grid->column('nilai', __('Nilai'));

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
        $show = new Show(Pengaturan::findOrFail($id));

        $show->field('nama', __('Nama'));
        $show->field('nilai', __('Nilai'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Pengaturan());

        $form->text('nama', __('Nama'));
        $form->text('nilai', __('Nilai'));

        return $form;
    }
}
