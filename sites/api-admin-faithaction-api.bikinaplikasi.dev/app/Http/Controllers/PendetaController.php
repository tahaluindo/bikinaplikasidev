<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Pendeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PendetaController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $pendeta = new Pendeta();

        if ($request->limit) {

            $pendeta = $pendeta->with(['gereja'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $pendeta = DB::select("select * from pendeta where $request->where");
        } else {
            $pendeta = $pendeta->with(['gereja'])->get();
        }

        return view('pendeta.index', [
            'pendeta' => $pendeta,
            'pendeta_count' => $pendeta->count()
        ]);
    }

    public function store(Request $request)
    {
        $this->checkUser();

    }

    public function show(Pendeta $pendeta)
    {
        $this->checkUser();

    }

    public function update(Request $request, Pendeta $pendeta)
    {
        $this->checkUser();

    }

    public function destroy(Pendeta $pendeta)
    {
        $this->checkUser();

    }


    public function disukai(Pendeta $pendeta, User $user)
    {
        $this->checkUser();

    }
}