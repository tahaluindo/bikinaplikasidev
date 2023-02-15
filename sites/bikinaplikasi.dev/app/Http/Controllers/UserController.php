<?php

namespace App\Http\Controllers;

use App\Models\AdminRoleUser;
use App\Models\AdminUser;
use App\Models\AdminUserPermission;
use App\Models\Rujukan;
use Encore\Admin\Admin;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Permission;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use Laravolt\Avatar\Avatar;
use PHPExcel;
use App\Models\User;

use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
// FileUploader

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['user'] = User::paginate(1000);

        $data['user_count'] = count(Schema::getColumnListing('user'));

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|string|max:30',
			'email' => 'required|email|max:50',
			'password' => 'required|max:100|confirmed',
			'password_confirmation' => 'required'
		]);
        $requestData = $request->all();

        

        User::create($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil menambah User');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register_user(Request $request)
    {
        
        // validasi captcha jangan sampai ada robot yg bisa daftar
        $client = (new Client)->request('POST','https://www.google.com/recaptcha/api/siteverify',[
            'form_params' => [
                'secret' => '6Le6F-MUAAAAAOAZBVViJeWeVGpsjw12ZyDHSvvn',
                'response' => request('g-recaptcha-response')
            ]
        ]);
                
        if (!json_decode($client->getBody()->getContents())->success) {
            
            return redirect()->back();
        }
        
        // perhhatikan berapa kali dia register, klo gagal terus kta suruh tunda
        if(!Cookie::get('register_attemps')) {
            
            Cookie::queue('register_attemps', 5, 60);    
        }
        
//        if(Cookie::get('register_attemps') >= env('APP_MAX_REGISTER_ATTEMPS')) {
//            
//            return abort(403, 'Terlalu banyak mencoba registrasi, coba lagi dalam 1 jam');
//        }
        
        if(Cookie::get('register_attemps')) {
            
            Cookie::queue('register_attemps', Cookie::get('register_attemps') + 1, 60);
        }
        
        $this->validate($request, [
			'name' => 'required|string|max:30',
			'email' => 'required|email|max:50|unique:admin_users,email',
			'username' => 'required|max:50|unique:admin_users,username|alpha_num',
			'password' => 'required|max:100|confirmed',
			'no_hp' => 'required|digits_between:10,15|numeric|unique:admin_users,no_hp',
			'password_confirmation' => 'required'
		]);
        
        $requestData = $request->all();
        
        $no_hp = $request->no_hp;
        $no_hp_prefix = substr($no_hp, 0, 2);
        $no_hp_value = substr($no_hp, 2);
        if($no_hp_prefix == '08') {
            $no_hp = '62' . $no_hp_value;
        }
        
        // validasi no hp nya aktif atau tidak aktif
        $client = (new Client)->request('POST',"http://apilayer.net/api/validate?access_key=2dfc0cebaf17183d7c132deb82d119d9&number=$no_hp&country_code=&format=1");
        if (!json_decode($client->getBody()->getContents())->valid) {

            return redirect()->back()->withInput($requestData)->withErrors(['no_hp' => 'No hp tidak valid / tidak aktif!']);
        }
        
        // validasi elamat emailnya aktif atau tidak
        $client = (new Client)->request('POST',"http://apilayer.net/api/check?access_key=df879e1d7447a039ebc5d3727feadecc&email=$request->email&smtp=1&format=1");
        if (!json_decode($client->getBody()->getContents())->smtp_check) {

            return redirect()->back()->withInput($requestData)->withErrors(['email' => 'Email tidak aktif!']);
        }
                
        $requestData['no_hp'] = $no_hp;
        $requestData['avatar'] = (new Avatar())->create($request->name)->toBase64();
//        dd($requestData);
        \DB::transaction(function() use($requestData) {
            $adminCreate = AdminUser::create($requestData);
            
            AdminRoleUser::create([
                'role_id' => 3,
                'user_id' => $adminCreate->id
            ]);
            
            AdminUserPermission::create([
                'permission_id' => 6,
                'user_id' => $adminCreate->id
            ]);
            
            if(request()->r) {
                
                Rujukan::create([
                    'user_admin_id' => request()->r,
                    'user_admin_id_r' => $adminCreate->id
                ]);
            }
            
            Cookie::forget('register_attemps');
        });
        
        $credentials = $request->only(['username', 'password']);
        $remember = $request->get('remember', false);
        
        if ($this->guard()->attempt($credentials, $remember)) {
            admin_toastr('Thankyouuu... Registrasi berhasil!', 'success');
            
            return redirect('admin');
        }
    }
    
    
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return (new Admin())->guard();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        $data["item"] = $user;
        $data["user"] = $user;

        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $data["user"] = $user;
        $data[strtolower("User")] = $user;

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
			'name' => 'required|string|max:30',
			'email' => 'required|email|max:50',
			'password' => 'required|max:100|confirmed',
			'password_confirmation' => 'required'
		]);

        $requestData = $request->all();

        $user->update($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $users = User::whereIn('id', json_decode($request->ids, true))->get();

        User::whereIn('id', $users->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data user');
    }

    public function laporan()
    {
        $data['limit'] = User::whereNotIn('level', ['Admin'])->count();

        return view('user.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new User)->getTable();
        $object = (new User);

        $fields = [];
        foreach(DB::select("DESC $table") as $tableField)
        {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["users"] = $object->orderBy($request->field, $request->order)
        // ->where('level', 'like', "%$request->level%")
        ->limit($request->limit)->get()->where('level', '!=', 'Admin');

        if(!$data["users"]->count()) {
            
            return back()->with('error', 'Data tidak ada!');
        }

        // kalo user memilih print excel
        if($request->print_excel) {
            
            return $this->print_excel($data["users"]);
        }

        return view("user.laporan.print", $data);
    }

    public function print_excel($data)
    {
        
        // todo: gunakan library PHPExcel
        $PHPExcel = new PHPExcel();

        // todo: mengambil isi header dari tabel users, cuman column kelas_id,nama,email
        $model = new User();
        $query = $model->query();

        $userTable = Arr::only(Schema::getColumnListing($model->getTable()), [1, 2, 4]);

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $userHeader);
        endforeach;
        // isi ke excel
        $column = "A";
        $row    = 2;
        foreach ($data as $user):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->name);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->email);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row, $user->level);

            $row++;
            $column = 'A';
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=print_excel_user.xlsx");

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function profile(User $user)
    {
        $data["user"] = $user;
        $data[strtolower("User")] = $user;

        return view('user.profile', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function profileUpdate(Request $request, User $user)
    {
        $this->validate($request, [
			'name' => 'required|string|max:30',
			'email' => 'required|email|max:50',
			'password' => 'required|max:100|confirmed',
			'password_confirmation' => 'required'
		]);

        $requestData = $request->all();

        $user->update($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah User');
    }
    
}