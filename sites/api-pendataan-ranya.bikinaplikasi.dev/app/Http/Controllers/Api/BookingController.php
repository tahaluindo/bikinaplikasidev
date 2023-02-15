<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index(Request $request)
    {
        \DB::enableQueryLog(); // Enable query log

        if($request->tanggal_awal_akan_antri) {

            $booking = Booking::orderBy("antrian")
                ->with(['user', 'layanan', 'layanan.bookings'])
                ->whereBetween('tanggal_akan_antri', [\Carbon\Carbon::parse($request->tanggal_awal_akan_antri)->format('Y-m-d'), \Carbon\Carbon::parse($request->tanggal_akhir_akan_antri)->format("Y-m-d")])
                ->limit($request->limit)
//                ->whereIn('status', ["Delay", "Call"])->values();
                ->get();
        } else {
            $booking = Booking::orderBy("antrian")
                ->with(['user', 'layanan', 'layanan.bookings'])
                ->orWhere('id', "like", "%" . $request->id . "%")
                ->orWhere('tanggal_akan_antri', "like", "%" . now()->toDateString() . "%")
                ->orWhere('user_id', "like", "%" . $request->userId . "%")
                ->orWhere('layanan_id', "like", "%" . $request->layananId . "%")
                ->orWhere('antrian', "like", "%" . $request->antrian . "%")
                ->orWhere('updated_at', "like", "%" . $request->updatedAt . "%")
                ->limit($request->limit)
                ->get()
                ->filter(function($item) {

                    return strpos($item->tanggal_akan_antri, now()->toDateString()) !== false;
                })->values();
        }

        return response()->json($booking);
    }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        Booking::where('id', $request->id)->update([
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 'Success',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            Booking::create($request->all());

            return response()->json([
                'status' => 'Success'
            ], 200);
        } catch (\Throwable $t) {
            file_put_contents("test.txt", $t->getMessage());

            return response()->json([
                'status' => 'Fail'
            ], 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Booking $booking)
    {
        $booking = Booking::with(['layanan.bookings', 'user'])->where('id', $booking->id)->first();

        return response()->json([
            'status' => 'Success',
            'booking' => $booking->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
