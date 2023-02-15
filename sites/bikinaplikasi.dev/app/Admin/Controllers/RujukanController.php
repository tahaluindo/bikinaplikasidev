<?php

namespace App\Admin\Controllers;

use App\Models\AdminUser;
use App\Models\Rujukan;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class RujukanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rujukan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Rujukan();
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

            $grid->model()->where('user_admin_id', \Admin::user()->id);
        }

        $grid->column('user_admin.name', __('Perujuk'));
        $grid->column('user_admin_r.name', __('Dirujuk'));
                
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
        $show = new Show(Rujukan::findOrFail($id));

        $show->field('user_admin.name', __('Perujuk'));
        $show->field('user_admin_r.name', __('Dirujuk'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Rujukan());

        $form->select('user_admin_id', __('Perujuk'))->options(AdminUser::pluck('name', 'id')->toArray());
        $form->select('user_admin_id_r', __('Dirujuk'))->options(AdminUser::pluck('name', 'id')->toArray());

        return $form;
    }
    
    public function getPermission()
    {
        
        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }
}
