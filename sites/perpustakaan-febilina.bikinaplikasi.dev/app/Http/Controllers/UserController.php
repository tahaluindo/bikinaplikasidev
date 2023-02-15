<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if(request()->level) {
            $data['user'] = User::where(['level' => $request->level])->paginate(1000);

        } else {

            $data['user'] = User::orWhere(['level' => 'Guru'])->orWhere(['level' => 'Siswa'])->paginate(1000);
        }

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
			'email' => 'required|email|max:50|unique:user,email',
			'password' => 'required|max:100|confirmed',
			'password_confirmation' => 'required'
		]);
        $requestData = $request->all();



        User::create($requestData);

        return redirect()->route('user.index')->with('success', 'Berhasil menambah User');
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
			'email' => "required|email|max:50|unique:user,email,$user->email,email",
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

        return view('user.laporan.index');
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
            'order' => 'required|in:ASC,DESC'
        ]);

        $data["users"] = $object->orderBy($request->field, $request->order)->get();

        if(!$data["users"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("user.laporan.print", $data);
    }

    public function profile(User $user)
    {
        $data["user"] = auth()->user();
        $data[strtolower("User")] = auth()->user();

        return view('user.profile', $data);
    }

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
