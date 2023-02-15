@extends('layouts.matrix-admin.auth')
@section('content')

        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center p-t-5 p-b-5">
                    <span class="db"><img src="{{ url($sekolah->logo) }}" alt="logo" width="178" height="40"></span>
                </div>
                <form class="form-horizontal m-t-20" id="loginform" method="POST"
                    action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i
                                            class="ti-user"></i></span>
                                </div>
                                <input type="email" name='email'
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required=""
                                    value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                            class="ti-pencil"></i></span>
                                </div>
                                <input type="password" name='password'
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                                    required="" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                            class="ti-pencil"></i></span>
                                </div>
                                <input type="password" name='password_confirmation'
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Password Confirmation" aria-label="Password Confirmation"
                                    aria-describedby="basic-addon1" required="" autocomplete="current-password">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <a class="btn btn-info" href="{{ route('login') }}" name="action">Back To
                                        Login</a>
                                    <button class="btn btn-success float-right" type="submit">Reset
                                        Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

@endsection
