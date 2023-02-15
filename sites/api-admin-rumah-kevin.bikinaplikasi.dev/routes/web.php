<?php
//dd(\Hash::make('userbiasa'));
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Rumah;
use App\Models\Tentang;
use App\Models\Disukai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

\Illuminate\Support\Facades\Auth::Routes();

Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:web', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['users_baru'] = User::where('created_at', 'like', '%' . \Carbon\Carbon::today()->toDateString() . '%')->get();
        $data['disukai_baru'] = Disukai::where('created_at', 'like', '%' . \Carbon\Carbon::today()->toDateString() . '%')->get();
        $data['users'] = User::all();
        $data['rumahs'] = Rumah::all();

        $data['disukai'] = Disukai::all();
        $data['tentangs'] = Tentang::all();

        $data['grafiks'] = [];

        $grafik_user = User::whereBetween('tanggal', [now()->addDays(-15)->toDateString(), now()->toDateString()]);

        for ($i = 0; $i < 15; $i++) {
            $tanggal = now()->addDays(-($i))->format("Y-m-d");

            $data['grafiks']['tanggals'][] = $tanggal;
            $data['grafiks']['users'][] = User::where('created_at', 'like', '%' . $tanggal . '%')->get()->count();
            $data['grafiks']['disukai'][] = Disukai::where('created_at', 'like', '%' . $tanggal . '%')->get()->count();
        }

        return view('dashboard', $data);

    })->name('dashboard');
    Route::resource('fasilitas', 'FasilitasController')->parameters(['fasilitas' => 'fasilitas']);

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/set-pemilik-rumah/{user}', [UserController::class, 'setPemilikRumah'])->name('user.set-pemilik-rumah');
    Route::post('user/laporan/print', [UserController::class, 'print'])->name('user.print');
    Route::get('user/{user}/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', [UserController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', [UserController::class, 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', [UserController::class, 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', "UserController")->parameters(['user' => 'user']);

    Route::post('ckeditor/upload', ['CKEditorController', 'upload']);

    Route::resource('rumah', 'RumahController')->parameters([
        'ko' => 'rumah',
        'rumah' => 'rumah'
    ]);

    Route::resource('disukai', 'DisukaiController');
    Route::resource('tentang', 'TentangController');
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