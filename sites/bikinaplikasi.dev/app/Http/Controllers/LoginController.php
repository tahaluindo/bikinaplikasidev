<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Controllers\AuthController;

class LoginController extends AuthController
{
    public function authenticate(Request $request)
    {
        // Retrive Input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->level == 'Unit Kerja') {
                if (!auth()->user()->unit_kerja) {
                    Auth::logout();

                    return redirect()->back()->with('error', 'Unit kerja belum dibuat');
                }

                if (auth()->user()->unit_kerja->status == 'Tidak Aktif') {
                    Auth::logout();

                    return redirect()->back()->with('error', 'Status akun kamu tidak aktif');
                }
            }

            if (auth()->user()->level == 'Rekrutmen') {
                if (!auth()->user()->rekrutmen) {
                    Auth::logout();

                    return redirect()->back()->with('error', 'Rekrutmen belum dibuat');
                }

                if (auth()->user()->rekrutmen->status == 'Tidak Aktif') {
                    Auth::logout();

                    return redirect()->back()->with('error', 'Status akun kamu tidak aktif');
                }

            }

            return redirect()->route('dashboard');
        }

        // if failed login
        return redirect('login');
    }

    public function forgot_password(Request $request)
    {
        // cek apakah emailny benar atau salah
        if(!AdminUser::where('email', $request->email)->first()) {
            
            die(json_encode([
               'status' => 'error',
               'message' => 'Email tidak ditemukan!' 
            ]));
        }
        
        \DB::transaction(function() use($request) {
            // Create the Transport
            $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('ramdanriawan3@gmail.com')
                ->setPassword('mshvmqbamavtljol');
    
            // Create the Mailer using your created Transport
            $mailer = new \Swift_Mailer($transport);
    
            // Create a message
            $token = encrypt($request->email . time() . csrf_token());
            $link_reset_password = secure_url('reset_password') . "?token=" . $token;
            
            $message = (new \Swift_Message('Lupa Password'))
                ->setFrom(['ramdanriawan3@gmail.com' => 'Ramdan Riawan'])
                ->setTo([$request->email])
                ->setBody("
                    <h2>Link Reset Password</h2>
                    
                    Kamu melakukan permintaan reset password, silakan klik link: <a href='$link_reset_password'>$link_reset_password</a> 
                
                ")
                ->setContentType('text/html');
    
            // Send the message
            try {
                $result = $mailer->send($message);
                
                PasswordReset::create([
                    'email' => $request->email,
                    'token' => $token,
                    'password_baru' => \Hash::make($request->password_baru),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'expired_at' => now()->addHour()
                ]);
            } catch (\Throwable $e) {
                
                die($e->getMessage());
            }
        });
    }

    public function reset_password(Request $request)
    {
        $password_reset = PasswordReset::where(['token' => $request->token]);
        
        if($password_reset->first()) {
            if (now()->gt(\Carbon\Carbon::parse($password_reset->first()->expired_at))) {
                
                return "Link reset password sudah kadaluarsa, silakan kirim lagi.";
            }
            
            $admin_user = AdminUser::where('email', $password_reset->first()->email);
            
            $admin_user->update([
                
                'password' => $password_reset->first()->password_baru
            ]);
            
            $password_reset->delete();
            
            self::login_using_id($admin_user->first()->id, true);
        } else {
            
            return '<strong color=\'red\'>Link reset password tidak valid!</strong>';
        }
    }
    
    public function login_using_id(int $id, bool $remember)
    {
        if ($this->guard('admin')->loginUsingId($id, $remember)) {
            
            admin_toastr('Password berhasil direset!');

            request()->session()->regenerate();
    
            echo "<script>window.location.href = 'admin'</script>";
        }
    }
}
