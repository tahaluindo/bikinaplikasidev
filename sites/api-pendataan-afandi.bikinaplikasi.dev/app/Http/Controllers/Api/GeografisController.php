<?php
namespace App\Http\Controllers\Api;

use App\Geografis;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeografisController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Geografis::where('pertanyaan', "like", "%" . $request->pertanyaan . "%")
            ->where('have_list_jawaban', "like", "%" . $request->have_list_jawaban . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        Geografis::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Geografis $geografis)
    {
        return response()->json([
            'status' => 'Success',
            'geografis' => Geografis::where('id', $geografis->id)->first()
        ]);
    }

    public function update(Request $request, Geografis $geografis)
    {
        $requestData = $request->all();

        $geografis->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Geografis $geografis)
    {
        $geografis->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
