<?php

namespace App\Http\Controllers\Api;

use App\Models\Disukai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:30',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|unique:user,no_hp',
            'email' => 'required|unique:user,email',
            'password' => 'required|max:100|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        DB::transaction(function () use ($request) {
            $requestData = $request->except(['password_confirmation']);
            $requestData['kode'] = Hash::make(time());

            User::create($requestData);

            try {
                $this->sendEmail($request->email, "Kode Verifikasi", "<h2>Link Verifikasi</h2> Klik link di bawah untuk verifikasi: " . url("api/user/check-verifikasi?email=$request->email&kode=" . $requestData['kode']));
            } catch (\Throwable $t) {
                header('content-type: application/json');

                die(json_encode([
                    "success" => false,
                    'message' => $t->getMessage()
                ]));
            }

        });

        return response()->json([
            "success" => true,
            "message" => "Berhasil registrasi, silakan klink link yg ada di email."
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
            if (!auth()->user()->is_verifikasi) {
                return response()->json([
                    "success" => false,
                    "message" => "User belum diverifikasi, mohon klik link verifikasi di email kamu!"
                ]);
            }

            return response()->json([
                "success" => true,
                "user" => auth()->user()
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
}