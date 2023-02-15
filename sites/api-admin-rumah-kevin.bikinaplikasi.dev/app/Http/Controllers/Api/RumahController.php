<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Rumah;
use App\Models\RumahFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RumahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user_id) {

            $rumah = Rumah::where('user_id', $request->user_id)->with(['disukais', 'user', 'rumah_fasilitas', 'rumah_fasilitas.fasilitas'])->withCount(['disukais'])->paginate(1000)->sortByDesc('id');
        } else {
            $rumah = Rumah::where('status', 'Tersedia')->with(['disukais', 'user', 'rumah_fasilitas', 'rumah_fasilitas.fasilitas'])->withCount(['disukais'])->paginate(1000)->sortByDesc('id');
        }

        if ($request->keyword) {
            $rumah = Rumah::with(['disukais', 'user', 'rumah_fasilitas', 'rumah_fasilitas.fasilitas'])->withCount(['disukais'])->where('nama', 'like', '%' . $request->keyword . '%')->paginate(1000);
        }

        if ($request->sort_by == "Disukai") {
            $rumah = $rumah->sortByDesc('disukais_count');
        } else if ($request->sort_by == "Termahal") {
            $rumah = $rumah->sortByDesc('harga_per_bulan');
        } else if ($request->sort_by == "Termurah") {
            $rumah = $rumah->sortByDesc('harga_per_bulan')->reverse();
        }


        if ($request->sort_by == "Tersedia") {
            $rumah = $rumah->where('status', 'Tersedia')->sortByDesc('id');
        } else if ($request->sort_by == "Tidak Tersedia") {
            $rumah = $rumah->where('status', 'Tidak Tersedia')->sortByDesc('id');
        } else if ($request->sort_by == "Baru Diajukan") {
            $rumah = $rumah->where('status', 'Baru Diajukan')->sortByDesc('id');
        } else if ($request->sort_by == "Ditolak") {
            $rumah = $rumah->where('status', 'Ditolak')->sortByDesc('id');
        } else if ($request->sort_by == "Diajukan Ulang") {
            $rumah = $rumah->where('status', 'Diajukan Ulang')->sortByDesc('id');
        }

        return response()->json([
            "success" => true,
            'data' => $rumah->values()
        ]);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);
        $fasilitas = $requestData['fasilitas'];
        unset($requestData['fasilitas']);

        $validator = Validator::make($requestData, [
            'nama' => 'required|max:40',
            'alamat_lengkap' => 'required|max:255',
            'latitude' => 'required|max:40',
            'longitude' => 'required|max:40',
            'deskripsi' => 'required|max:255',
            'jumlah_kamar' => 'required',
            'harga_per_tahun' => 'required',
            'harga_per_bulan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                'message' => $validator->errors()
            ]);
        }

        if ($request->hasFile('gambar1')) {
            $requestData['gambar1'] = str_replace("\\", "/", $request->file('gambar1')
                ->move('uploads', time() . "1." . $request->file('gambar1')->getClientOriginalExtension()));
        } else {
            return response()->json([
                "success" => false,
                'message' => "Gambar 1 wajib diisi"
            ]);
        }

        if ($request->hasFile('gambar2')) {
            $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
                ->move('uploads', time() . "2." . $request->file('gambar2')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar3')) {
            $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
                ->move('uploads', time() . "3." . $request->file('gambar3')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar4')) {
            $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
                ->move('uploads', time() . "4." . $request->file('gambar4')->getClientOriginalExtension()));
        }

        if ($request->hasFile('gambar5')) {
            $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
                ->move('uploads', time() . "5." . $request->file('gambar5')->getClientOriginalExtension()));
        }

        $rumahCreate = Rumah::create($requestData);

        foreach ($fasilitas as $key => $item) {
            if (json_decode($item)->selected) {
                RumahFasilitas::create([
                    'rumah_id' => $rumahCreate->id,
                    'fasilitas_id' => json_decode($item)->id
                ]);
            }
        }

        return response()->json([
            "success" => true,
            'message' => 'Berhasil menambah Rumah'
        ]);
    }

    public function show(Rumah $rumah)
    {
        return response()->json([
            "success" => true,
            'data' => $rumah
        ]);
    }

    public function update(Request $request, Rumah $rumah)
    {
        $requestData = json_decode($request->all()['data'], true);
        $fasilitas = $requestData['fasilitas'];
        unset($requestData['fasilitas']);
        unset($requestData['gambar1']);
        unset($requestData['gambar2']);
        unset($requestData['gambar3']);
        unset($requestData['gambar4']);
        unset($requestData['gambar5']);

        $validator = Validator::make($requestData, [
            'nama' => 'required|max:40',
            'alamat_lengkap' => 'required|max:255',
            'latitude' => 'required|max:40',
            'longitude' => 'required|max:40',
            'deskripsi' => 'required|max:255',
            'jumlah_kamar' => 'required',
            'harga_per_tahun' => 'required',
            'harga_per_bulan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                'message' => $validator->errors()
            ]);
        }

        if ($request->hasFile('gambar1')) {
            $requestData['gambar1'] = str_replace("\\", "/", $request->file('gambar1')
                ->move('uploads', time() . "1." . $request->file('gambar1')->getClientOriginalExtension()));

            File::delete($rumah->gambar1);
        }

        if ($request->hasFile('gambar2')) {
            $requestData['gambar2'] = str_replace("\\", "/", $request->file('gambar2')
                ->move('uploads', time() . "2." . $request->file('gambar2')->getClientOriginalExtension()));
            File::delete($rumah->gambar2);
        }

        if ($request->hasFile('gambar3')) {
            $requestData['gambar3'] = str_replace("\\", "/", $request->file('gambar3')
                ->move('uploads', time() . "3." . $request->file('gambar3')->getClientOriginalExtension()));
            File::delete($rumah->gambar3);
        }

        if ($request->hasFile('gambar4')) {
            $requestData['gambar4'] = str_replace("\\", "/", $request->file('gambar4')
                ->move('uploads', time() . "4." . $request->file('gambar4')->getClientOriginalExtension()));
            File::delete($rumah->gambar4);
        }

        if ($request->hasFile('gambar5')) {
            $requestData['gambar5'] = str_replace("\\", "/", $request->file('gambar5')
                ->move('uploads', time() . "5." . $request->file('gambar5')->getClientOriginalExtension()));
            File::delete($rumah->gambar5);
        }


        $rumah->update($requestData);
        RumahFasilitas::where('rumah_id', $rumah->id)->delete();
        foreach ($fasilitas as $key => $item) {
            if (json_decode($item)->selected) {
                RumahFasilitas::create([
                    'rumah_id' => $rumah->id,
                    'fasilitas_id' => json_decode($item)->id
                ]);
            }
        }

        return response()->json([
            "success" => true,
            'message' => 'Berhasil mengupdate Rumah'
        ]);
    }

    public function destroy(Rumah $rumah)
    {
        $rumah->delete();

        return response()->json([
            "success" => true,
            'message' => "Berhasil menghapus Rumah"
        ]);
    }


    public function disukai(Rumah $rumah, User $user)
    {
        if ($disukai = Disukai::where('rumah_id', $rumah->id)->where('user_id', $user->id)->first()) {
            $disukai->update([
                'disukai' => 'Tidak'
            ]);
        } else {
            Disukai::create([
                'rumah_id' => $rumah->id,
                'user_id' => $user->id,
                'disukai' => 'Ya'
            ]);
        }

        return response()->json([
            "success" => true
        ]);
    }
}