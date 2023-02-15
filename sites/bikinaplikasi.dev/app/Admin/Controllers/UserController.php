<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new User();
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
        $grid->column('current_team_id', __('Current team id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('password', __('Password'));
        $grid->column('two_factor_secret', __('Two factor secret'));
        $grid->column('two_factor_recovery_codes', __('Two factor recovery codes'));
        $grid->column('no_hp', __('No hp'));
        $grid->column('level', __('Level'));
        $grid->column('status', __('Status'));
        $grid->column('profile_photo_path', __('Profile photo path'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('verified', __('Verified'));
        $grid->column('verification_token', __('Verification token'));
        
        

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('current_team_id', __('Current team id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
        $show->field('two_factor_secret', __('Two factor secret'));
        $show->field('two_factor_recovery_codes', __('Two factor recovery codes'));
        $show->field('no_hp', __('No hp'));
        $show->field('level', __('Level'));
        $show->field('status', __('Status'));
        $show->field('profile_photo_path', __('Profile photo path (Tidak Wajib)'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('remember_token', __('Remember token'));
        $show->field('verified', __('Verified'));
        $show->field('verification_token', __('Verification token'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

//        $form->number('current_team_id', __('Current team id'));
        $form->text('name', __('Name'));
        $form->email('email', __('Email'))->creationRules('required|email|unique:users,email');
        $form->password('password', __('Password'));
//        $form->textarea('two_factor_secret', __('Two factor secret'));
//        $form->textarea('two_factor_recovery_codes', __('Two factor recovery codes'));
        $form->text('no_hp', __('No hp'))->creationRules('required|phone:ID|integer|unique:users,no_hp');
        $form->select('level', __('Level'))->options([
            
            'Karyawan',
            'Pelanggan'
        ]);
        $form->select('status', __('Status'))->options([
            'Aktif',
            'Tidak Aktif'
        ]);
        $form->image('profile_photo_path');
//        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
//        $form->text('remember_token', __('Remember token'));
        $form->switch('verified', __('Verified'));
//        $form->text('verification_token', __('Verification token'));
        
        


        return $form;
    }
}
