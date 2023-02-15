@extends('layouts.index')
@section('content')
    <!--about-us start -->
    <section id="home" class="about-us-2"></section>

    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Profile akun
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">

                <form method="post" action="{{ url('pelanggan/profile') }}" enctype="multipart/form-data">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Nama</h2>
                                <div class="travel-check-icon">
                                    <input type="text" name="name"
                                           class="form-control flatpickr-input  @error('name') is-invalid @enderror"
                                           placeholder="Nama pemesan"
                                           value="{{ auth()->user() ? auth()->user()->name : old('name') }}">

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
                                           value="{{ auth()->user() ? auth()->user()->email : old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('no_hp') ? 'has-error' : ''}}">
                                <h2>No Hp</h2>
                                <div class="travel-check-icon">
                                    <input type="text" name="no_hp"
                                           class="form-control flatpickr-input  @error('no_hp') is-invalid @enderror"
                                           placeholder="No hp pemesan"
                                           value="{{ auth()->user() ? auth()->user()->no_hp : old('no_hp') }}">

                                    @error('no_hp')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="single-tab-select-box  {{ $errors->has('password') ? 'has-error' : ''}}">
                                <h2>Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="password"
                                           class="form-control"
                                           placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="single-tab-select-box  {{ $errors->has('konfirmasi_password') ? 'has-error' : ''}}">
                                <h2>Konfirmasi Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="password_confirmation"
                                           class="form-control"
                                           placeholder="Konfirmasi Password">

                                    @error('konfirmasi_password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('foto') ? 'has-error' : ''}}">
                                <h2>Foto (Tidak Wajib)</h2>

                                <img
                                    src="{{ url(auth()->user()->foto != "" ? auth()->user()->foto : "image/no_image.png") }}"
                                    width="100">

                                <div class="travel-check-icon" style="margin-top: 20px;">
                                    <input type="file" name="foto"
                                           class="form-control flatpickr-input  @error('foto') is-invalid @enderror"
                                           value="">

                                    @error('foto')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box">
                                <div class="">
                                    <button class="book-btn">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
