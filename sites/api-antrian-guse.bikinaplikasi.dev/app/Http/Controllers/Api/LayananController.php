<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Layanan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LayananController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(Layanan::with('user')
            ->with(['user', 'user.layanan', 'bookings' => function ($query) use ($request) {
                $query
                    ->where('created_at', "like", "%" . now()->toDateString() . "%");
            }])
            ->withCount(['bookings' => function ($query) use ($request) {
                $query
                    ->where('created_at', "like", "%" . now()->toDateString() . "%");
            }])
            ->orWhere('id', "like", "%" . $request->id . "%")
            ->orWhere('user_id', "like", "%" . $request->userId . "%")
            ->orWhere('nama', "like", "%" . $request->nama . "%")
            ->orWhere('deskripsi', "like", "%" . $request->deskripsi . "%")
            ->orWhere('jalan', "like", "%" . $request->jalan . "%")
            ->orWhere('kecamatan', "like", "%" . $request->kecamatan . "%")
            ->orWhere('kabupaten', "like", "%" . $request->kabupaten . "%")
            ->orWhere('provinsi', "like", "%" . $request->provinsi . "%")
            ->orWhere('buka_jam', "like", "%" . $request->bukaJam . "%")
            ->orWhere('status', "like", "%" . $request->status . "%")
            ->limit($request->limit)
            ->get()
            ->sortBy('bookings_count', true)
            ->values());
    }

    public function search(Request $request)
    {
        $layanans = Layanan::with(['user', 'user.layanan', 'bookings' => function ($query) use ($request) {
            $query
                ->where('created_at', "like", "%" . now()->toDateString() . "%");
        }])
            ->withCount(['bookings' => function ($query) use ($request) {
                $query
                    ->where('created_at', "like", "%" . now()->toDateString() . "%");
            }])
            ->limit($request->limit)
            ->where('nama', "like", "%" . $request->keyword . "%")
            ->get();

        if (!$layanans->count()) {
            $layanans = Layanan::with(['user', 'user.layanan', 'bookings' => function ($query) use ($request) {
                $query
                    ->where('created_at', "like", "%" . now()->toDateString() . "%");
            }])
                ->withCount(['bookings' => function ($query) use ($request) {
                    $query
                        ->where('created_at', "like", "%" . now()->toDateString() . "%");
                }])
                ->limit($request->limit)
                ->get()
                ->filter(function ($item) use ($request) {
                    return preg_match("/$request->keyword/", $item->user->no_hp);
                });
        }

        return response()->json($layanans->values());
    }

    public function getNoAntrian(Request $request)
    {
        if ($booking = Booking::where([
            'layanan_id' => $request->layanan_id,
            'user_id' => $request->user_id,
            'status' => 'Delay'
        ])->first()) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Sudah mengantri'
            ], 406);
        } elseif (Booking::where([
            'layanan_id' => $request->layanan_id,
            'user_id' => $request->user_id,
            'status' => 'Call'
        ])->first()) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Sudah mengantri',
            ], 406);
        } else {
            $booking = Booking::where('tanggal_akan_antri', 'like', "%" . \Carbon\Carbon::parse($request->tanggal_akan_antri)->format("Y-m-d") . "%")->get()->last();
            return response()->json([
                'status' => 'Success',
                'antrian' => $booking ? $booking->antrian + 1 : 1
            ]);
        }

    }

    public function updateStatus(Request $request)
    {
        Layanan::where('id', $request->id)->update([
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 'Success',
        ], 200);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|unique:layanan,nama',
                'deskripsi' => 'required|max:100',
                'jalan' => 'required|max:50',
                'kecamatan' => 'required|max:50',
                'kabupaten' => 'required|max:50',
                'provinsi' => 'required|max:50',
                'buka_jam' => 'required|max:50',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages()
                ], 406);
            }

            $requestData = $request->all();

            if ($request->hasFile('gambar')) {
                $requestData['gambar'] =
                    str_replace("api/", "",
                        str_replace("\\", "/", $request->file('gambar')->move('api/images', Str::random(40) . ".png")));
            }

            Layanan::create($requestData);

            return response()->json([
                'status' => 'Success',
            ]);
        } catch (\Throwable $t) {
            file_put_contents("test.json", $t->getMessage());
        }
    }

    public function show(Layanan $layanan)
    {
        $layanan = Layanan::withCount('bookings')->with(['bookings', 'user'])->where('id', $layanan->id)->first();

        return response()->json([
            'status' => 'Success',
            'layanan' => $layanan->toArray()
        ]);
    }

    public function getFromUser(Request $request)
    {
        $layanan = Layanan::where('user_id', $request->user_id)->first();

        return response()->json([
            'status' => 'Success',
            'layanan' => $layanan->toArray()
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {

        try {
            $requestData = $request->all();
            if ($request->hasFile('gambar')) {
                File::delete("api/" . $layanan->gambar);

                $requestData['gambar'] =
                    str_replace("api/", "",
                        str_replace("\\", "/", $request->file('gambar')->move('api/images', Str::random(40) . ".png")));
            }

            $layanan->update($requestData);

            return response()->json([
                'status' => 'Success',
            ], 200);
        } catch (\Throwable $t) {
            file_put_contents("test.json", $t->getMessage());
        }
    }

    public function destroy(Layanan $layanan)
    {

    }

    public function isBooked(Request $request)
    {
        $bookingDelay = Booking::where([
            'user_id' => $request->user_id,
            'layanan_id' => $request->layanan_id,
            'status' => 'Delay'
        ])->first();

        $bookingCall = Booking::where([
            'user_id' => $request->user_id,
            'layanan_id' => $request->layanan_id,
            'status' => 'Call'
        ])->first();

        if ($bookingDelay || $bookingCall) {
            return response()->json([
                'status' => 'Success',
                'is_booked' => true
            ]);
        } else {
            return response()->json([
                'status' => 'Success',
                'is_booked' => false
            ]);
        }
    }

}
