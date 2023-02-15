<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\UnitUsaha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function model(Request $request)
    {
        return response()->json(User::with(['karyawan_unit_usaha.unit_usaha'])->first());
    }

    public function kirimUlangKodeVerifikasi(Request $request)
    {
        try {
            $this->sendEmail($request->email, "Kode Verifikasi Pendaftaran", "Berikut adalah kode verifikasi pendaftaranmu di kelola: " . $request->kodeVerifikasi);
        } catch (\Throwable $t) {
            return response()->json([
                "success" => false,
                'message' => $t->getMessage()
            ]);
        }

        return response()->json([
            "success" => true,
        ]);
    }

    public function registerManual(Request $request)
    {
        file_put_contents("update.json", json_encode($request->all()));

        $validator = Validator::make($request->all(), [
            'namaPenanggungJawab' => 'required|string|max:40',
            'email' => 'required|email',
            'noHp' => 'required|unique:user,noHp',
            'password' => 'required|max:100|confirmed|min:6',
            'password_confirmation' => 'required',
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        DB::transaction(function () use ($request) {
            $requestData = $request->except(['password_confirmation', 'kodeVerifikasi']);

            $userCreate = User::create($requestData);

            try {
                $this->sendEmail($request->email, "Kode Verifikasi Pendaftaran", "Berikut adalah kode verifikasi pendaftaranmu di kelola: " . $request->kodeVerifikasi);
            } catch (\Throwable $t) {
                return response()->json([
                    "success" => false,
                    'message' => $t->getMessage()
                ]);
            }
        });

        return response()->json([
            "success" => true,
            "message" => "Berhasil registrasi, silakan klink link yg ada di email."
        ]);
    }

    public function updateVerifikasiStatus(Request $request)
    {
        $requestData = $request->all();

        $user = User::where('email', $request->email)->first();

        $user->update($requestData);

        return response()->json([
            "success" => true,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:30',
            'jenis_kelamin' => 'required',
            'no_hp' => "required|unique:user,no_hp,$user->no_hp,no_hp",
            'email' => "required|unique:user,email,$user->email,email|email",
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

        $user->update($requestData);

        $user = User::find($user->id);

        return response()->json([
            "success" => true,
            "user" => $user
        ]);
    }

    public function login(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return response()->json([
                "success" => true,
                "user" => User::with(['karyawan_unit_usaha.unit_usaha'])->findOrFail(auth()->user()->id)
            ]);
        }

        return response()->json([
            "success" => false,
            "message" => "Email / password salah!"
        ]);
    }

    public function profile(User $user)
    {
        return response()->json([
            "success" => true,
            "user" => $user
        ]);
    }

    public function getCurrentUserLike(Request $request)
    {
        $disukai = Disukai::where('rumah_id', $request->rumah_id)->where('user_id', $request->user_id)->where("disukai", "Ya")->first();

        if ($disukai) {
            return response()->json([
                "success" => true,
                "is_current_user_like" => true
            ]);
        }

        return response()->json([
            "success" => true,
            "is_current_user_like" => false
        ]);
    }

    public function setCurrentUserLike(Request $request)
    {
        $disukai = Disukai::where('rumah_id', $request->rumah_id)->where('user_id', $request->user_id)->where("disukai", "Ya")->first();

        if ($disukai) {
            $disukai->update([
                'disukai' => 'Tidak'
            ]);

            return response()->json([
                "success" => true,
            ]);
        }

        Disukai::create([
            'rumah_id' => $request->rumah_id,
            'user_id' => $request->user_id,
            'disukai' => "Ya"
        ]);

        return response()->json([
            "success" => true,
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $kode = Hash::make(time());

        User::where('email', $request->email)->update([
            'kode' => $kode
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:user,email|email',
            'password' => 'required|max:100|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        try {
            $this->sendEmail($request->email, "Kode Reset Password", "<h2>Link Reset Password</h2> Klik link di bawah untuk verifikasi: " . url("api/user/forgot-password-done?email=" . base64_encode($request->email) . "&kode=" . $kode . "&password=" . base64_encode($request->password)));
        } catch (\Throwable $t) {
            return response()->json([
                "success" => false,
                'message' => $t->getMessage()
            ]);
        }

        return response()->json([
            "success" => true,
            'message' => "Kode reset password telah berhasil dikirim"
        ]);
    }

    public function forgotPasswordDone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|exists:user,kode',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $user = User::where('kode', $request->kode)->first();

        $user->update([
            'password' => base64_decode($request->password)
        ]);

        return response()->json([
            "success" => true,
            'message' => "Password telah berhasil direset!"
        ]);
    }

    public function verifikasi(Request $request)
    {
        $kode = Hash::make(time());

        User::where('email', $request->email)->update([
            'kode' => $kode
        ]);

        try {
            $this->sendEmail($request->email, "Kode Verifikasi", "<h2>Link Verifikasi</h2> Klik link di bawah untuk verifikasi: " . url("api/user/check-verifikasi?email=$request->email&kode=" . $kode));
        } catch (\Throwable $t) {
            return response()->json([
                "success" => false,
                'message' => $t->getMessage()
            ]);
        }

        return response()->json([
            "success" => true,
            'message' => "Kode verifikasi telah berhasil dikirim"
        ]);
    }

    public function checkVerifikasi(Request $request)
    {
        if ($user = User::where('kode', $request->kode)->first()) {
            $user->update([
                'is_verifikasi' => 1
            ]);

            return response()->json([
                "success" => true,
                'message' => "User telah berhasil diverifikasi"
            ]);
        }

        return response()->json([
            "success" => false,
            'message' => "User gagal diverifikasi!"
        ]);
    }

    private function sendEmail($to, $subject, string $messageBody)
    {
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('ramdanriawan3@gmail.com')
            ->setPassword('ejqsjftwcfafypko');

        // Create the Mailer using your created    Transport
        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message($subject))
            ->setFrom(['ramdanriawan3@gmail.com' => 'Rerumah'])
            ->setTo([$to])
            ->setBody($messageBody)
            ->setContentType('text/html');

        $mailer->send($message);
    }

    public function addFotoProfile(Request $request)
    {
        $validator = Validator::make(json_decode($request->all()['data'], true), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->toArray()
            ]);
        }

        $requestData = json_decode($request->all()['data'], true);

        if ($request->hasFile('fotoProfile')) {
            $requestData['fotoProfile'] = str_replace("\\", "/", $request->file('fotoProfile')
                ->move('uploads', time() . "." . $request->file('fotoProfile')->getClientOriginalExtension()));
        }

        $user = User::findOrFail($requestData['user_id']);
        unset($requestData['user_id']);
        DB::transaction(function () use ($requestData, $request, $user) {
            $user->update($requestData);
        });

        $user = User::findOrFail($user->id);

        return response()->json([
            "success" => true,
            "user" => $user
        ]);
    }
        
    public function registerInformasiUsaha(Request $request)
    {
        $validator = Validator::make(json_decode($request->all()['data'], true), [
            'namaUsaha' => 'required',
            'namaUnitUsaha' => 'required',
            'noHpUnitUsaha' => 'required',
            'jenis_usaha_id' => 'required',
            'lokasi_usaha_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->toArray()
            ]);
        }

        $requestData = json_decode($request->all()['data'], true);

        if ($request->hasFile('logoUsaha')) {
            $requestData['logoUsaha'] = str_replace("\\", "/", $request->file('logoUsaha')
                ->move('uploads', time() . "." . $request->file('logoUsaha')->getClientOriginalExtension()));
        }
              
        $requestData['user_id'] = User::where('email', $requestData['email'])->first()->id;
        unset($requestData['email']);
        UnitUsaha::create($requestData);

        return response()->json([
            "success" => true,
        ]);
    }
}