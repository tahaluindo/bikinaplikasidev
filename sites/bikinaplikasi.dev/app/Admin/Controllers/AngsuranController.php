<?php

namespace App\Admin\Controllers;

use App\Models\Angsuran;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Schema;

class AngsuranController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Angsuran';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $model = new Angsuran();
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
        $grid->column('user.name', __('User id'));
        $grid->column('pesanan_id', __('Pesanan id'));
        $grid->column('angsuran_ke', __('Angsuran ke'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Angsuran::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name', __('User id'));
        $show->field('pesanan_id', __('Pesanan id'));
        $show->field('angsuran_ke', __('Angsuran ke'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Angsuran());

        $form->select('user_id', __('User id'))->options(User::pluck('name', 'id')->toArray());
        $form->select('pesanan_id', __('Pesanan id'))->options(Pesanan::pluck('no', 'id')->toArray());
        $form->number('angsuran_ke', __('Angsuran ke'));
        $form->select('status', __('Status'))->options([
            'Lunas',
            'Belum Lunas'
        ])->default('Belum Lunas');

        return $form;
    }
    
    public function pelunasan()
    {
        //pastikan yang membuat pelunasan adalah admin
        if(\Admin::user()->username == 'admin') {
            // langsung buat pelunasan untuk setiap angsuran yg belum lunas
            // pelunasan dibuat diakhir, biasanya 2 minggu sebelum akhir
            Angsuran::where('status', 'Belum Dibayar')->where('no', 'like', "%" . request()->no . "%")->get()->each(function ($item) {
                \DB::transaction(function() use($item) {
                    
                    \App\Models\Tripay::closedTransaction($item, $item->method, time() + (86400 * env('APP_WAKTU_PELUNASAN_HARI')));
                });
            });
            
            return redirect(route('admin.pesanan.index'));
        }
        
    }
    
    public function tripayCallback()
    {
        
    }
}
