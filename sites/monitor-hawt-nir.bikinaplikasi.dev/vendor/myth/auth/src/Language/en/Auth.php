<?php

return [
    // Exceptions
    'invalidModel'              => 'The {0} model must be loaded prior to use.',
    'userNotFound'              => 'Tidak bisa menemukan user dengan ID = {0, number}.',
    'noUserEntity'              => 'User Entity harus diinputkan untuk password validation.',
    'tooManyCredentials'        => 'Kamu hanya bisa memvalidasi 1 kredensial lagi.',
    'invalidFields'             => '"{0}" tidak bisa digunakan untuk memvalidasi kredensial.',
    'unsetPasswordLength'       => 'Kamu harus set minimum password length.',
    'unknownError'              => 'Maaf, terjadi kendala untuk pengiriman email, silakan coba beberapa saat lagi.',
    'notLoggedIn'               => 'Kamu harus login untuk mengakses halaman itu.',
    'notEnoughPrivilege'        => 'Kamu tidak memiliki hak akses untuk halaman tersebut.',

    // Registration
    'registerDisabled'          => 'Maaf, tidak bisa registrasi untuk saat ini',
    'registerSuccess'           => 'Selamat datang, silakan login.',
    'registerCLI'               => 'User baru telah dibuat.',

    // Activation
    'activationNoUser'          => 'User dengan aktivasi kode tersebut tidak ditemukan',
    'activationSubject'         => 'Aktifkan akunmu.',
    'activationSuccess'         => 'Tolong konfirmasikan akunmu dengan mengklik link yang tersedia di emailmu.',
    'activationResend'          => 'Kirim pesan aktivasi sekali lagi.',
    'notActivated'              => 'Akun ini belum teraktivasi.',
    'errorSendingActivation'    => 'Gagal mengirim pesan aktivasi ke: {0}',

    // Login
    'badAttempt'                => 'Gagal login, cek kredensialmu.',
    'loginSuccess'              => 'Selamat datang!',
    'invalidPassword'           => 'Gagal login, cek passwordmu.',

    // Forgotten Passwords
    'forgotDisabled'            => 'Reset password tidak diperbolehkan.',
    'forgotNoUser'              => 'Gagal mencari user dengan email tersebut.',
    'forgotSubject'             => 'Instruksi reset password.',
    'resetSuccess'              => 'Passwordmu telah diganti, silakan login dengan password barumu.',
    'forgotEmailSent'           => 'Token security telah dikirim ke emailmu, paste di kolom dibawah ini.',
    'errorEmailSent'            => 'Gagal mengirim instruksi reset password ke: {0}',

    // Passwords
    'errorPasswordLength'       => 'Password harus lebih dari {0, number} karakter.',
    'suggestPasswordLength'     => 'Pass phrases - up to 255 characters long - make more secure passwords that are easy to remember.',
    'errorPasswordCommon'       => 'Password must not be a common password.',
    'suggestPasswordCommon'     => 'The password was checked against over 65k commonly used passwords or passwords that have been leaked through hacks.',
    'errorPasswordPersonal'     => 'Passwords cannot contain re-hashed personal information.',
    'suggestPasswordPersonal'   => 'Variations on your email address or username should not be used for passwords.',
    'errorPasswordTooSimilar'    => 'Password is too similar to the username.',
    'suggestPasswordTooSimilar'  => 'Do not use parts of your username in your password.',
    'errorPasswordPwned'        => 'The password {0} has been exposed due to a data breach and has been seen {1, number} times in {2} of compromised passwords.',
    'suggestPasswordPwned'      => '{0} should never be used as a password. If you are using it anywhere change it immediately.',
    'errorPasswordEmpty'        => 'Password wajib diisi.',
    'passwordChangeSuccess'     => 'Password telah berhasil diganti.',
    'userDoesNotExist'          => 'Password tidak diganti. User tidak ditemukan.',
    'resetTokenExpired'         => 'Maaf. Reset tokenmu sudah expired.',

    // Groups
    'groupNotFound'             => 'Gagal menemukan group: {0}.',

    // Permissions
    'permissionNotFound'        => 'Gagal menemukan permission: {0}',

    // Banned
    'userIsBanned'              => 'User telah dibanned. Kontak administrator.',

    // Too many requests
    'tooManyRequests'           => 'Terlalu banyak request. Silakan tunggu {0, number} seconds.',

    // Login views
    'home'                      => 'Beranda',
    'current'                   => 'Saat Ini',
    'forgotPassword'            => 'Lupa password?',
    'enterEmailForInstructions' => 'Tidak masalah! inputkan emailmu dan kami akan segera mengirimkan instruksinya.',
    'email'                     => 'Email',
    'emailAddress'              => 'Alamat Email',
    'sendInstructions'          => 'Kirim Instruksi',
    'loginTitle'                => 'Login',
    'loginAction'               => 'Login',
    'rememberMe'                => 'Remember me',
    'needAnAccount'             => 'Registrasi?',
    'forgotYourPassword'        => 'Lupa password?',
    'password'                  => 'Password',
    'repeatPassword'            => 'Ulangi Password',
    'emailOrUsername'           => 'Username',
    'username'                  => 'Username',
    'register'                  => 'Register',
    'signIn'                    => 'Masuk',
    'alreadyRegistered'         => 'Sudah registrasi?',
    'weNeverShare'              => 'Kami tidak pernah share emailmu dengan siapapun.',
    'resetYourPassword'         => 'Reset passwordmu',
    'enterCodeEmailPassword'    => 'Masukkan kode yang kamu terima melalui email.',
    'token'                     => 'Token',
    'newPassword'               => 'Password Baru',
    'newPasswordRepeat'         => 'Ulangi Password Baru',
    'resetPassword'             => 'Reset Password',
];
