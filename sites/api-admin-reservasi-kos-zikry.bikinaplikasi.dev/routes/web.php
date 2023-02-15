<?php
//dd(\Hash::make('ramdanriawan3@gmail.com'));
use App\Models\Kos;
use App\Models\Tentang;
use App\Models\Disukai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['users_baru'] = User::where('created_at', 'like', '%' . \Carbon\Carbon::today()->toDateString() . '%')->get();
        $data['disukai_baru'] = Disukai::where('created_at', 'like', '%' . \Carbon\Carbon::today()->toDateString() . '%')->get();
        $data['users'] = User::all();
        $data['koss'] = Kos::all();

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

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/set-pemilik-kos/{user}', [UserController::class, 'setPemilikKos'])->name('user.set-pemilik-kos');
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);

    Route::resource('kos', 'App\Http\Controllers\KosController')->parameters([
        'ko' => 'kos',
        'kos' => 'kos'
    ]);

    Route::resource('disukai', 'App\Http\Controllers\DisukaiController');
    Route::resource('tentang', 'App\Http\Controllers\TentangController');
});

Route::prefix('api')->group(function () {
    Route::get('user/login', function (Request $request) {

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'verifikasi' => 1
        ])) {
            return response()->json([
                "success" => true,
                "user" => auth()->user()
            ]);
        } else {
            return response()->json([
                "success" => false,
                "user" => auth()->user()
            ]);
        }

    });
    
    Route::get('user/reset-password-verifikasi', function (Request $request) {

        User::where('email', $request->email)->update([
            
            'password' => Hash::make(base64_decode($request->code))
        ]);
        
        die("Berhasil mereset password, silakan login!");
    });

    Route::get('user/reset-password', function (Request $request) {
        
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('ramdanriawan3@gmail.com')
            ->setPassword('ejqsjftwcfafypko');

        // Create the Mailer using your created    Transport
        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Reset Password Rekos'))
            ->setFrom(['ramdanriawan3@gmail.com' => 'Rekos'])
            ->setTo([$request->email])
            ->setBody("<h2>Link Reset Password</h2> Klik link registrasi berikut untuk menyelesaikan: " . url("api/user/reset-password-verifikasi?email=$request->email&code=" . base64_encode($request->password)))
            ->setContentType('text/html');

        // Send the messagess
        try {
            $result = $mailer->send($message);
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    });

    Route::get('user/update', function (Request $request) {
        User::findOrFail($request->id)->update([
            'nama' => $request->nama,
            'password' => $request->password
        ]);

        return response()->json([
            'success' => true
        ]);
    });

    Route::get('tentang', function (Request $request) {

        return response()->json(Tentang::first()->toArray());
    });
    
    Route::get('user/verifikasi', function (Request $request) {
        if($user = User::where('email', base64_decode($request->code))->first()) {
            User::where('email', base64_decode($request->code))->update([
                'verifikasi' => 1
            ]);
            
            die("Berhasil mengautentikasi, silakan login ke aplikasi!");
        } else {
            die("Gagal mengautentikasi!");
        }
    });

    Route::get('user/register', function (Request $request) {

        if (User::where("email", $request->email)->count()) {
            return response()->json([
                'success' => false]);
        }

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('ramdanriawan3@gmail.com')
            ->setPassword('ejqsjftwcfafypko');

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Registrasi Rekos'))
            ->setFrom(['ramdanriawan3@gmail.com' => 'Rekos'])
            ->setTo([$request->email])
            ->setBody("<h2>Link Registrasi</h2> Klik link registrasi berikut untuk menyelesaikan: " . url('api/user/verifikasi?code=' . base64_encode($request->email)))
            ->setContentType('text/html');

        // Send the message
        try {
            $result = $mailer->send($message);
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    });

    Route::get('user', function (Request $request) {

        return response()->json(auth()->user());
    });

    Route::get('kos', function (Request $request) {

        return response()->json(["data" => Kos::all()->count() ? Kos::with("disukais")->get()->map(function ($item) {
            $item->jumlah_disukai = $item->disukais->where('disukai', 'Ya')->count();

            return $item;
        })->filter(function ($item) {
            return true;
//            return User::find($item->user_id)->status == 'Pemilik Kos';
        })->toArray() : []]);

    });

    Route::post('kos/store', function (Request $request) {

//        $request->validate([
//            'nama' => 'required|max:30',
//            'pemilik' => 'required|max:30',
//            'alamat_lengkap' => 'required|max:255',
//            'alamat_gmaps' => 'required|max:255',
//            'deskripsi' => 'required|max:255',
//            'no_hp' => 'required|max:15',
//            'jumlah_kamar' => 'required|max:2',
//            'pemilik' => 'required|max:99',
//            'fasilitas' => 'required|max:255',
//            'gambar' => 'required',
//            'kategori' => 'required|in:Laki - Laki,Perempuan,Laki - Laki / Perempuan',
//            'harga_terendah' => 'required|max:10000000',
//            'harga_tertinggi' => 'required|max:10000000',
//            'harga_tertinggi' => 'required|max:10000000',
//        ]);

        try {
            $requestData = $request->all();
            file_put_contents("uploads/cek1.json", collect($requestData)->toJson());

            if ($request->hasFile('gambar')) {
                $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar2')) {
                $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar2')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar3')) {
                $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar3')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar4')) {
                $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar4')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar5')) {
                $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar5')->getClientOriginalExtension()));
            }

            Kos::create($requestData);
            file_put_contents("uploads/cek2.json", json_encode($requestData));
        } catch (\Throwable $t) {
            file_put_contents("uploads/cek3.json", $t->getMessage());
        }
    });

    Route::get('kos/{kos}/disukai', function (Request $request, Kos $kos) {
        return response()->json(["data" => $kos->disukais ?? []]);
    });

    Route::get('kos/{kos}/destroy', function (Request $request, Kos $kos) {
        $kos->delete();

        file_put_contents("uploads/cek.json", "dsfsdfdsf");

        return response()->json(["success" => true]);
    });

    Route::post('kos/update', function (Request $request) {
        try {
            $requestData = $request->except(['gambar']);

            if ($request->hasFile('gambar')) {
                $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar2')) {
                $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar2')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar3')) {
                $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar3')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar4')) {
                $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar4')->getClientOriginalExtension()));
            }

            if ($request->hasFile('gambar5')) {
                $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
                    ->move('uploads', uuid_create(UUID_TYPE_DEFAULT) . "." . $request->file('gambar5')->getClientOriginalExtension()));
            }

            Kos::where('id', $request->id)->update($requestData);
        } catch (Exception $e) {
            file_put_contents("uploads/cek.json", $e->getMessage);
        }

        return response()->json(["success" => true]);
    });

    Route::get('kos/{kos}/disukai/{user}/disukai', function (Request $request, Kos $kos, User $user) {
        $disukai = Disukai::where([
            'kos_id' => $kos->id,
            'user_id' => $user->id
        ]);

        if ($disukai->get()->count()) {
            $disukai->update([
                'disukai' => 'Ya'
            ]);
        } else {
            Disukai::create([
                'kos_id' => $kos->id,
                'user_id' => $user->id,
                'disukai' => 'Ya'
            ]);
        }

        return response()->json(["success" => true]);
    });

    Route::get('kos/{kos}/disukai/{user}/tidak-disukai', function (Request $request, Kos $kos, User $user) {
        $disukai = Disukai::where([
            'kos_id' => $kos->id,
            'user_id' => $user->id
        ]);

        if ($disukai->get()->count()) {
            $disukai->update([
                'disukai' => 'Tidak'
            ]);
        } else {
            Disukai::create([
                'kos_id' => $kos->id,
                'user_id' => $user->id,
                'disukai' => 'Tidak'
            ]);
        }

        return response()->json(["success" => true]);
    });

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