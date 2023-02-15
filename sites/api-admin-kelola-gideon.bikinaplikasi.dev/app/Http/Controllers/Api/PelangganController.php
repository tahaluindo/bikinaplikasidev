<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function model(Request $request)
    {
        return response()->json(Pelanggan::first());
    }

    public function index(Request $request)
    {
        $pelanggan = new Pelanggan();

        if ($request->limit) {

            $pelanggan = $pelanggan->limit($request->limit);
        }

        if ($request->where) {

            $pelanggan = DB::select("select * from pelanggan where $request->where");
        } else {

            $pelanggan = $pelanggan->get();
        }


        return response()->json([
            "success" => true,
            'data' => $pelanggan
        ]);
    }


    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        $validator = Validator::make($requestData, [
            'nama' => 'required|string|max:40',
            'noHp' => 'unique:pelanggan,noHp',
            'email' => 'unique:pelanggan,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        DB::transaction(function () use ($request, $requestData) {
            $pelangganCreate = Pelanggan::create([
                'nama' => $requestData['nama'],
                'noHp' => $requestData['noHp'],
                'email' => $requestData['email'],
                'alamat' => $requestData['alamat'],
            ]);
        });

        return response()->json([
            "success" => true,
            "message" => ""
        ]);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:30',
            'jenis_kelamin' => 'required',
            'no_hp' => "required|unique:pelanggan,no_hp,$pelanggan->no_hp,no_hp",
            'email' => "required|unique:pelanggan,email,$pelanggan->email,email|email",
            'password' => 'max:100|confirmed',
            'password_confirmation' => '',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $requestData = $request->except(['password_confirmation', '_method']);
        if ($request->password != "" || preg_replace("/\s/", "", $request->password) == "" || $request->password == null) {
            $requestData = $request->except(['password_confirmation', '_method', 'password']);
        }

        $pelanggan->update($requestData);

        $pelanggan = Pelanggan::find($pelanggan->id);

        return response()->json([
            "success" => true,
            "pelanggan" => $pelanggan
        ]);
    }
}