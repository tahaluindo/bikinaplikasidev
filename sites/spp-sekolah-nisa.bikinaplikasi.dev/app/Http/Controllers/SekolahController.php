<?php

namespace App\Http\Controllers;

use App\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        //

        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $this->validate($request, [ 
            'nama'      => 'required|min:3|max:50',
            // 'deskripsi' => 'required',
            'logo'      => 'mimes:png,jpg,ico',
            // 'alamat'    => 'required|min:30|max:255',
            // 'no_telp'   => 'required|digits_between:6,15',
        ]);

        // defaultnya kita ambil semua data yg diinputkan
        $requestData = $request->all();

        // kalo seandainya admin mengubah logo
        if ($request->logo) {

            $logo_destination = "img/" . $request->logo->getClientOriginalName();
            $request->logo->move("foto", $logo_destination);

            // buat nilai logo jadi nilai logo_destination
            // supaya bisa langsung disimpan dengan $request->all()
            // pake request except karena mau ngerewrite request->logo
            // request->request->add gk bisa ngerewrite input type file
            $requestData = $request->except('logo');
            $requestData['logo'] = $logo_destination;
        }

        $sekolah->update($requestData);

        return redirect()->route('sekolah.edit', 1)->with("success", "Berhasil mengupdate Sekolah");
    }
}
