@extends('layouts.index')
@section('content')
    <!--about-us start -->
<section id="home" class="about-us-2">


</section>
<!--about-us end -->

    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Login akun
                </h2>
                <p>
                    Pastikan email dan password kamu benar!
                </p>
            </div>
            <div class="packages-content">

                <form method="post" action="{{ url('pelanggan/login') }}">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">

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

                            <div class="single-tab-select-box  {{ $errors->has('password') ? 'has-error' : ''}}">
                                <h2>Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="password"
                                           class="form-control"
                                           placeholder="password">

                                    @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('register') ? 'has-error' : ''}}">
                                <div class="">
                                    <button class="book-btn">Login

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
@endsection
