<?php

namespace App\Admin\Controllers;

use App\Models\AdminUser;
use App\Models\AkunPembayaran;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class AkunPembayaranController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Akun Pembayaran';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new AkunPembayaran();
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
            $grid
//            ->disableCreateButton()
            ->disableExport()
            ->disableColumnSelector()
            ->disableFilter()
            ->disableRowSelector()
            ->disableExport()
                ->actions(function ($actions) {

                    $actions->disableDelete();
                });

            $grid->model()->where('user_admin_id', \Admin::user()->id);
        }


        $grid->column('user_admin.name', __('User'));
        $grid->column('jenis', __('Jenis'));
        $grid->column('nama_akun', __('Nama akun'));
        $grid->column('no_akun', __('No akun / Rekening'));

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
        $show = new Show(AkunPembayaran::findOrFail($id));

        $form->field('user_admin.name', __('User id'));
        $show->field('jenis', __('Jenis'));
        $show->field('nama_akun', __('Nama akun'));
        $show->field('no_akun', __('No akun'));
        
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AkunPembayaran());
        
        if($this->getPermission() == 'Pelanggan') {
            
            $form->select('user_admin_id', __('User id'))->options(AdminUser::where('id', \Admin::user()->id)->pluck('name', 'id')->toArray())->readOnly()->value(\Admin::user()->id);
        } else {
            $form->select('user_admin_id', __('User id'))->options(AdminUser::pluck('name', 'id')->toArray());
        }
        
        $form->select('jenis', __('Jenis'))->options([
            'DANA' => 'DANA','BCA' => 'BCA','BRI' => 'BRI','BNI' => 'BNI','MANDIRI' => 'MANDIRI'
        ])->rules('required')->value('DANA');
//        dd(request('no_akun'));
        $form->text('nama_akun', __('Nama akun'))->rules('required');
        $form->text('no_akun', __('No akun'))->rules("required|unique:akun_pembayaran,no_akun," . request('no_akun') . ",no_akun");

        return $form;
    }
    
        
    public function getPermission()
    {
        
        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }

}
