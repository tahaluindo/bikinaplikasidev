<?php

namespace App\Admin\Controllers;

use App\Models\Video;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Video';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Video());

        $grid->column('judul', __('Judul'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('link', __('Link'))->display(function ($item) use ($grid) {

            $href = route('admin.video.view') . "?path=$item";

            return "
                <a href='$href' class='text-success' target='_blank'>
                    <i class='fa fa-eye'></i>
                    Lihat
                </a>
            ";
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        if ($this->getPermission() == 'Pelanggan') {
            $grid->disableCreateButton()
                ->disableExport()
                ->disableColumnSelector()
                ->disableFilter()
                ->disableRowSelector()
                ->disableExport()
                ->disableActions()
                ->actions(function ($actions) {

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
        $show = new Show(Video::findOrFail($id));

        $show->field('judul', __('Judul'));
        $show->field('deskripsi', __('Deskripsi'));
        $show->field('link', __('Link'));
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
        $form = new Form(new Video());

        $form->text('judul', __('Judul'));
        $form->text('deskripsi', __('Deskripsi'));
        $form->url('link', __('Link (Jika manual)'));
        $form->file('file_video', __('File Video'));

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

        if (Video::where('judul', request()->judul)->first() || Video::where('link', request()->link)->first()) {

            admin_toastr('Video sudah ada', 'error');

            return redirect()->back('admin.video.create');
        }

        $disk = Storage::disk('s3');
        $link = '';
        if (request()->link) {
            $link = str_replace("%20", "-", str_replace(' ', '-', basename(request()->link)));
            
            if (!$disk->put("videos/" . $link, fopen(request()->link, 'r'))) {

                admin_toastr('Gagal memindahkan video', 'error');

                return redirect()->back('admin.video.create');
            }
        } else {
            $link = str_replace("%20", "-", str_replace(' ', '-', request()->file('file_video')->getClientOriginalName()));

            if (!$disk->put('videos/' . $link, request()->file('file_video')->getLinkTarget())) {

                admin_toastr('Gagal memindahkan video', 'error');

                return redirect()->back('admin.video.create');
            }
        }

        Video::create([
            'judul' => request()->judul,
            'deskripsi' => request()->deskripsi,
            'link' => $link
        ]);

        admin_toastr('Berhasil memindahkan video', 'success');

        header('location: ' . route('admin.video.index'));
    }

    public function view(Request $request)
    {
        $disk = Storage::disk('s3');
        $file = $disk->temporaryUrl('videos/' . $request->path, now()->addMinutes(5));

        header("location: $file");

        exit;
    }
    
    public function destroy($id)
    {
        $video = Video::find($id);
        
        $disk = Storage::disk('s3');
        $disk->delete('videos/' . $video->link)->delete();
        $video->delete();
        
        admin_toastr('Berhasil menghapus video', 'success');

        header('location: ' . route('admin.video.index'));
    }
}
