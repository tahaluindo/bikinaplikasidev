<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\NotificationDilihat;
use App\Models\NotificationDishare;
use App\Models\NotificationDisukai;
use App\Models\NotificationKomentar;
use App\Models\Disukai;
use App\Models\Notification;
use App\Models\NotificationFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notification = new Notification();

        if ($request->limit) {

            $notification = $notification->with(['user'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $notification = DB::select("select * from notification where $request->where");
        } else {
            $notification = $notification->with(['user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $notification
        ]);
    }

    public function store(Request $request)
    {
        Notification::create($request->all());

        return response()->json([
            "success" => true,
            'message' => 'Berhasil menambah Notification'
        ]);
    }

    public function show(Notification $notification)
    {
        return response()->json([
            "success" => true,
            'data' => Notification::with(['user'])->first()
        ]);
    }

    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->all());

        return response()->json([
            "success" => true,
            'message' => 'Berhasil mengupdate Notification'
        ]);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            "success" => true,
            'message' => "Berhasil menghapus Notification"
        ]);
    }

}