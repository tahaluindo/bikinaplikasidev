<?php

namespace App\Admin\Controllers;

use App\Models\Karyawan;
use App\Models\Produk;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class KaryawanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Karyawan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Karyawan();
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
        $grid->column('user.name', __('User Id'));
        
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
        $show = new Show(Karyawan::findOrFail($id));
        $show->field('id', __('Id'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Karyawan());

        $form->select('user_id', 'User')->options(User::pluck('name', 'id')->toArray());

        return $form;
    }
}
