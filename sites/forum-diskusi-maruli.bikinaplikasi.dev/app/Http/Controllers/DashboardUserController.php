<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardUserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index', [
            'users' => User::where('is_admin', 0)->get()
        ]);
    }

    public function profile(User $user)
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function profileUpdate(Request $request)
    {
        if ($request->password) {

            $this->validate($request, [
                'name' => 'required|string|max:30',
                'password' => 'required|max:100|confirmed',
                'password_confirmation' => 'required_if:password,!=,null'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:30',
            ]);
        }

        $requestData = $request->except(['_method', 'password_confirmation', '_token']);

        if ($request->hasFile('foto_profile')) {
            $requestData['foto_profile'] = str_replace("\\", "/", $request->file('foto_profile')
                ->move('foto_profile', time() . "." . $request->file('foto_profile')->getClientOriginalExtension()));
        }

        if (!$request->password) {
            unset($requestData['password']);
            unset($requestData['password_confirmation']);
        } else {
            $requestData['password'] = Hash::make($request->password);
            unset($requestData['password_confirmation']);
        }

        User::findOrFail(auth()->id())->update($requestData);

        return redirect()->back()->with('success', 'Berhasil mengupdate profile');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('dashboard/user')->with('success', 'User has been deleted!');
    }

    public function banned(User $user)
    {
        $user->update([
            'status' => 'Dibanned'
        ]);

        return redirect('dashboard/user')->with('success', 'User has been banned!');
    }
}
