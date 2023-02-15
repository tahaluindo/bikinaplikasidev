<?php

namespace App\Admin\Controllers;

use App\Models\Session;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SessionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Session';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Session());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('ip_address', __('Ip address'));
        $grid->column('user_agent', __('User agent'));
        $grid->column('payload', __('Payload'));
        $grid->column('last_activity', __('Last activity'));

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
        $show = new Show(Session::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('ip_address', __('Ip address'));
        $show->field('user_agent', __('User agent'));
        $show->field('payload', __('Payload'));
        $show->field('last_activity', __('Last activity'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Session());

        $form->number('user_id', __('User id'));
        $form->text('ip_address', __('Ip address'));
        $form->textarea('user_agent', __('User agent'));
        $form->textarea('payload', __('Payload'));
        $form->number('last_activity', __('Last activity'));

        return $form;
    }
}
