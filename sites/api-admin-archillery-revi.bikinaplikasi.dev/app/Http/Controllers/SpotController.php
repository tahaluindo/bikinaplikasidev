<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SpotController extends Controller
{
    public function checkSpot()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkSpot();
        $data['spot'] = Spot::paginate(1000);

        $data['spot_count'] = count(Schema::getColumnListing('spot'));

        return view('spot.index', $data);
    }

    public function create()
    {
        $this->checkSpot();
        return view('spot.create');
    }

    public function store(Request $request)
    {
        $this->checkSpot();
        $this->validate($request, [
            'fullName' => 'required|string|max:30',
            'jenisKelamin' => 'required',
            'noHp' => "required|unique:spot,noHp",
            'email' => "required|unique:spot,email",
            'level' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $requestData = $request->except(['password_confirmation']);

        Spot::create($requestData);

        return redirect()->route('spot.index')->with('success', 'Berhasil menambah Spot');
    }

    public function show(Spot $spot)
    {
        $this->checkSpot();
        $data["item"] = $spot;
        $data["spot"] = $spot;

        return view('spot.show', $data);
    }

    public function edit(Spot $spot)
    {
        $this->checkSpot();
        $data["spot"] = $spot;
        $data[strtolower("Spot")] = $spot;

        return view('spot.edit', $data);
    }

    public function update(Request $request, Spot $spot)
    {
        $this->checkSpot();
        $this->validate($request, [
            'fullName' => 'required|string|max:30',
            'jenisKelamin' => 'required',
            'noHp' => "required|unique:spot,noHp,$spot->noHp,noHp",
            'email' => "required|unique:spot,email,$spot->email,email",
            'level' => 'required|max:100',
            'alamat' => 'required',
        ]);

        $requestData = $request->except(['password_confirmation', '_method']);

        $spot->update($requestData);

        return redirect()->route('spot.index')->with('success', 'Berhasil mengubah Spot');
    }

    public function destroy(Spot $spot)
    {
        $this->checkSpot();
        $spot->delete();

        return redirect()->route('spot.index')->with('success', 'Spot berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $this->checkSpot();
        $spot_ids = collect(json_decode($request->ids, true))->filter(function ($item) {

            return $item != Spot::where('level', 'Admin')->first()->id;
        });

        $spots = Spot::whereIn('id', $spot_ids->toArray())->get();

        Spot::whereIn('id', $spots->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data spot');
    }

    public function profile(Spot $spot)
    {
        $this->checkSpot();
        $data["spot"] = $spot;
        $data[strtolower("Spot")] = $spot;

        return view('spot.profile', $data);
    }

    public function profileUpdate(Request $request, Spot $spot)
    {
        $this->checkSpot();
        $this->validate($request, [
            'fullName' => 'required|string|max:30',
            'jenisKelamin' => 'required',
            'noHp' => "required|unique:spot,noHp,$spot->noHp,noHp",
            'email' => "required|unique:spot,email,$spot->email,email",
            'alamat' => 'required',
            'noHp' => 'required',
        ]);

        $requestData = $request->except(['password_confirmation']);

        if ($request->hasFile('fotoProfile')) {
            $requestData['fotoProfile'] = str_replace("\\", "/", $request->file('fotoProfile')
                ->move('uploads', time() . "." . $request->file('fotoProfile')->getClientOriginalExtension()));

            \File::delete($spot->gambar);
        }

        $spot->update($requestData);

        return redirect()->route('spot.index')->with('success', 'Berhasil mengubah Spot');
    }
}