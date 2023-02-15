<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CkEditorController;
use App\Http\Controllers\DashboardUserController;
use App\Models\Category;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardPostController;

//dd(\Hash::make('admin'));
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Saud Maruli Panjaitan",
        "email" => "chmaruli28@gmail.com",
        "image" => "maruli.JPG"

    ]);
});

Route::post('/posts/{post:slug}/set-as-the-best-komen/{komen}', [PostController::class, 'setAsTheBestKomen']);
Route::post('/posts/{post:slug}/upload-images', [PostController::class, 'uploadImages']);
Route::post('/posts/{post:slug}/komen', [PostController::class, 'komen']);
Route::put('/posts/{post:slug}/komen/{komen}', [PostController::class, 'komenUpdate']);
Route::delete('/posts/{post:slug}/komen/{komen}', [PostController::class, 'komenDestroy']);
Route::post('posts/komen/{komen}/balasan', [PostController::class, 'balasan']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::delete('/posts/{post:slug}', [PostController::class, 'destroy']);

Route::get('dashboard/user/profile', [DashboardUserController::class, 'profile']);
Route::put('dashboard/user/profile', [DashboardUserController::class, 'profileUpdate']);
Route::get('dashboard/user/{user}/banned', [DashboardUserController::class, 'banned']);
Route::resource('dashboard/user', DashboardUserController::class);

// ckeditor
Route::post('ckeditor/upload', [CkEditorController::class, 'upload']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Category',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    $title = '';
    if (request('category')) {
        $category = Category::firstWhere('slug', request('category'));
        $title = ' in ' . $category->name;
    }

    if (request('author')) {
        $author = User::firstWhere('username', request('author'));
        $title = ' by ' . $author->name;
    }

    $posts = Post::withCount('komens')->latest()->filter(request(['search', 'category', 'author']))->paginate(1000)->withQueryString()->sortByDesc('komens_count');
    $categories = Category::withCount('posts')->latest()->paginate(1000)->sortByDesc('posts_count');

    return view('dashboard.index', [
        "title" => "Post Terfavorit" . $title,
        "active" => 'posts',
        "posts" => $posts->values(),
        "categories" => $categories->values(),
        'users' => User::all()
    ]);
}
)->middleware('auth');

Route::view('/disqus.index', 'disqus')->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])
    ->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->parameters([
    'category' => 'category:slug',
]);

Route::get('/test', function (Request $request) {

    return 'oke';
});




Route::get('/listing-program', function () {
    $zipFile = "listing-program.zip";
    $zipArchive = new ZipArchive();

    if ($zipArchive->open($zipFile, (ZipArchive::CREATE | ZipArchive::OVERWRITE)) !== true)
        die("Failed to create archive\n");

    // Controllers
    foreach (glob(base_path('app/Http/Controllers') . "/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('app/Http/Controllers') . "/*/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('app/Http/Controllers') . "/*/*/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    // Routes
    foreach (glob(base_path('routes') . "/web.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('routes') . "/api.php") as $item) {

        $zipArchive->addFile($item);
    }


    // Views
    $exclude_folder = '/layouts|vendor|errors/';
    foreach (glob(base_path('resources/views') . "/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*.php") as $item) {

        if(preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*/*.php") as $item) {

        if(preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    if ($zipArchive->status != ZIPARCHIVE::ER_OK)
        echo "Failed to write files to zip\n";

    $zipArchive->close();

    return redirect('listing-program.zip');
});


Route::get('/public', function () {
    $zipFile = "public.zip";
    $zipArchive = new ZipArchive();

    // Controllers
    foreach (glob(base_path('public/image') . "/*.png") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/image') . "/*.jpg") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/img') . "/*.png") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/img') . "/*.jpg") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/gambar') . "/*.png") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/gambar') . "/*.jpg") as $item) {

        $zipArchive->addFile($item);
    }

    if ($zipArchive->status != ZIPARCHIVE::ER_OK)
        echo "Failed to write files to zip\n";

    $zipArchive->close();

    return redirect('public.zip');
});