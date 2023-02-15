<?php

namespace App\Admin\Controllers;

use App\Models\Saran;
use App\Models\User;
use Doctrine\DBAL\Schema\Schema;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SaranController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Saran';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Saran();
        $grid = new Grid($model);

        $grid->filter(function ($filter) use ($model) {
            // Remove the default id filter
            $filter->disableIdFilter();

            $filter->where(function ($query) use ($model) {
                collect(\Illuminate\Support\Facades\Schema::getColumnListing($model->getTable()))->except([0])->each(function ($column) use ($query) {

                    $query->orWhere($column, 'like', "%{$this->input}%");
                });
            }, 'Pencarian');
        });

        $grid->column('admin_user.name', __('User'));
        $grid->column('saran', __('Saran'))->display(function ($item) {

            return Str::limit($item, 25, '...');
        });

        // Kalo yg login pelanggan
        if ($this->getPermission() == 'Pelanggan') {
            $grid
                ->disableExport()
                ->disableColumnSelector()
                ->disableRowSelector()
                ->disableExport()
                ->actions(function ($actions) {

                    $actions->disableEdit();
                    $actions->disableDelete();
                });
            
            $grid->disableActions(true);

            $grid->model()->where('admin_user_id', \Admin::user()->id);
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
        $show = new Show(Saran::findOrFail($id));

        $show->field('user.name', __('User id'));
        $show->field('saran', __('Saran'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Saran());

        if (!$this->getPermission() == 'Pelanggan') {
            $form->select('user_id', __('User id'))->options(User::pluck('name', 'id')->toArray());
        }

        $form->textarea('saran', __('Saran'));

        return $form;
    }

    public function getPermission()
    {

        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }

    public function store()
    {
        $data = \request()->all();

        if ($this->getPermission() == 'Pelanggan') {
            
            $data['admin_user_id'] = \Admin::user()->id;
        }

        // Handle validation errors.
        if(Validator::make($data, [
            'saran' => 'required|max:255',
        ])->fails()) {
            
            admin_toastr("Saran wajib diisi, dan tidak boleh lebih dari 255 karakter!", 'error');
            
            return redirect()->back()->withInput($data);
        }
        
        Saran::create($data);
        
        admin_toastr("Berhasil menambahkan saran", 'success');
        return redirect()->route('admin.saran.index');
    }
}
