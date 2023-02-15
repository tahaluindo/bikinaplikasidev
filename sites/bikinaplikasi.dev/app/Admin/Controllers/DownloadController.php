<?php

namespace App\Admin\Controllers;

use App\Models\Download;
use App\Models\Produk;
use Aws\S3\S3Client;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DownloadController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Download';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = new Download();
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

//        $grid->column('id', __('Id'));
        $grid->column('judul', __('Judul'));
        $grid->column('path', __('Link'))->display(function($item) use($grid) {
            
            $href = route('admin.download.download') . "?path=$item";
            
            return "
                <a href='$href' class='text-success' download>
                    <i class='fa fa-download'></i>
                    Download
                </a>
            ";
        });
        
        $grid->column('deskripsi', __('Deskripsi'));
                
        // Kalo yg login pelanggan
        if ($this->getPermission() == 'Pelanggan') {
            $grid->disableCreateButton()
                ->disableExport()
                ->disableColumnSelector()
//                ->disableFilter()
                ->disableRowSelector()
                ->disableExport()
                ->actions(function ($actions) {

                    $actions->disableEdit();
                    $actions->disableDelete();
                });
            $grid->disableActions(true);
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
        $show = new Show(Download::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('judul', __('Judul'));
        $show->field('link', __('Link'));
        $show->field('deskripsi', __('Deskripsi'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Download());

        $form->text('judul', __('Judul'));
        $form->text('path', __('path'));
        $form->text('link', __('Link'));
        $form->text('deskripsi', __('Deskripsi'));

        return $form;
    }
        
    public function getPermission()
    {

        return \Admin::user()->permissions()->get()->first()->name ?? 'Admin';
    }
    
    public function store()
    {
        ini_set('max_execution_time', 1000000);
        ini_set('memory_limit', '512M');
        
        if(Download::where('link', request()->link)->first()) {
            
            admin_toastr('File sudah ada', 'error');
        
            return redirect()->back('admin.download.create');
        }
        
        $disk = Storage::disk('s3');
        
        if(!$disk->put(request()->path, fopen(request()->link, 'r'))) {
            
            admin_toastr('Gagal memindahkan file', 'error');
        
            return redirect()->back('admin.download.create');
        }
        
        Download::create([
            'judul' => request()->judul,
            'path' => request()->path,
            'link' => request()->link,
            'deskripsi' => request()->deskripsi
        ]);

        admin_toastr('Berhasil memindahkan file', 'success');
        
        header('location: ' . route('admin.download.index'));
    }
    
    public function download(Request $request)
    {
        $disk = Storage::disk('s3');
        $file = $disk->temporaryUrl($request->path, now()->addMinutes(5));
        
        header("location: $file");
        
        exit;
    }
    
    public function destroy($id)
    {
        $disk = Storage::disk('s3');
        
        $download = Download::find($id);
        $file = $disk->delete($download->path);
        
        if(!$file) {
            
            admin_toastr('Gagal menghapus file', 'error');
        } else {
            
            admin_toastr('Berhasil menghapus file', 'success');
        }
                
        header('location: ' . route('admin.download.index'));
    }
}