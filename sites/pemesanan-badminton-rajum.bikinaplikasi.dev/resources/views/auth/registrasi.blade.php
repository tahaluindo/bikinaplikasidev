@extends('layouts.index')
@section('content')
    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Isi data akun
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">

                <form method="post" action="{{ url('register') }}">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Nama</h2>
                                <div class="travel-check-icon">
                                    <input type="text" name="name"
                                           class="form-control flatpickr-input  @error('name') is-invalid @enderror"
                                           placeholder="Nama pemesan"
                                           value="{{ isset($user->name) ? $user->name : old('name') }}">

                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="single-tab-select-box  {{ $errors->has('email') ? 'has-error' : ''}}">
                                <h2>Email</h2>
                                <div class="travel-check-icon">
                                    <input type="email" name="email"
                                           class="form-control flatpickr-input  @error('email') is-invalid @enderror"
                                           placeholder="Email"
                                           value="{{ isset($user->email) ? $user->email : old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>No Hp</h2>
                                <div class="travel-check-icon">
                                    <input type="text" name="no_hp"
                                           class="form-control flatpickr-input  @error('name') is-invalid @enderror"
                                           placeholder="Nama pemesan"
                                           value="{{ isset($user->name) ? $user->name : old('name') }}">

                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('konfirmasi_password') ? 'has-error' : ''}}">
                                <h2>Konfirmasi Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="konfirmasi_password"
                                           class="form-control"
                                           placeholder="konfirmasi password">

                                    @error('konfirmasi_password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="single-tab-select-box  {{ $errors->has('konfirmasi_password') ? 'has-error' : ''}}">
                                <h2>Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="konfirmasi_password"
                                           class="form-control"
                                           placeholder="konfirmasi_password">

                                    @error('konfirmasi_password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('foto') ? 'has-error' : ''}}">
                                <h2>Foto (Tidak Wajib)</h2>
                                <div class="travel-check-icon">
                                    <input type="file" name="foto"
                                           class="form-control flatpickr-input  @error('foto') is-invalid @enderror"
                                           placeholder="Nama pemesan"
                                           value="{{ isset($user->foto) ? $user->foto : old('foto') }}">

                                    @error('foto')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('register') ? 'has-error' : ''}}">
                                <div class="">
                                    <button class="book-btn">Register

                                    </button>

                                    @error('register')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!--packages end-->
@endsection
