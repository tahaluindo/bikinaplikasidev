<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\QrCode;
use App\Models\QrCodeFasilitas;
use App\Models\QrCodeKategori;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class QrCodeController extends Controller
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

        $qrcode = new QrCode();

        if ($request->limit) {

            $qrcode = $qrcode->limit($request->limit)->get();
        } elseif ($request->where) {

            $qrcode = DB::select("select * from qrcode where $request->where");
        } else {
            $qrcode = $qrcode->get();
        }

        return view('qrcode.index', [
            'qrCode' => $qrcode,
            'qrCode_count' => $qrcode->count()
        ]);
    }

    public function create()
    {
        $this->checkUser();
        
        return view('qrcode.create');
    }

    public function store(Request $request)
    {
        $this->checkUser();
        
        $requestData = $request->all();

        $this->validate($request, [
            'nominal' => 'required',
        ]);
        
        $qrcodeCreate = QrCode::create($requestData);

        return redirect()->route('qrcode.index')->with('success', 'Berhasil menambah qrCode');
    }

    public function show(QrCode $qrcode)
    {
        $this->checkUser();
        
        echo \qrCode($qrcode->nominal);
    }

    public function edit(QrCode $qrcode)
    {
        $this->checkUser();
        
        $data["qrCode"] = $qrcode;
        $data[strtolower("QrCode")] = $qrcode;
        
        return view('qrcode.edit', $data);
    }

    public function update(Request $request, QrCode $qrcode)
    {
        $this->checkUser();
        
        $requestData = $request->all();

        $this->validate($request, [
            'nominal' => 'required',
        ]);

        $qrcodeCreate = $qrcode->update($requestData);

        return redirect()->route('qrcode.index')->with('success', 'Berhasil mengubah qrCode');
    }

    public function destroy(QrCode $qrcode)
    {
        $this->checkUser();
        
        $qrcode->delete();

        return redirect()->route('qrcode.index')->with('success', 'Berhasil mengubah qrCode');
    }
}