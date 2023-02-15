<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeluargaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Keluarga::with(['keluarga_details'])
            ->withCount(['keluarga_details'])
            ->where('nkk', "like", "%" . $request->nkk . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        if (Keluarga::where('nkk', $request->nkk)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Keluarga::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Keluarga $keluarga)
    {
        return response()->json([
            'status' => 'Success',
            'keluarga' => Keluarga::where('id', $keluarga->id)->first()
        ]);
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $requestData = $request->all();

        $keluarga->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
