@extends('dashboard.layout.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-md-6">
        <form class="form-horizontal form-material"
              action="{{ url('dashboard/user/profile') }}" method="post"
              enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3 form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="control-label">{{ 'Name' }}</label>

                <div class="col-md-12">
                    <input placeholder="name"
                           class="form-control form-control-line @error('name') is-invalid @enderror"
                           name="name" type="text" id="name"
                           value="{{ isset($user->name) ? $user->name : old('name') }}"
                           required>

                    @error('name')
                    <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="control-label">{{ 'Email' }}</label>

                <div class="col-md-12">
                    <input placeholder="email"
                           class="form-control form-control-line @error('email') is-invalid @enderror"
                           name="email" type="email" id="email"
                           value="{{ isset($user->email) ? $user->email : old('email') }}"
                           required disabled>

                    @error('email')
                    <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                <label for="username" class="control-label">{{ 'Username' }}</label>

                <div class="col-md-12">
                    <input placeholder="username"
                           class="form-control form-control-line @error('username') is-invalid @enderror"
                           name="username" type="username" id="username"
                           value="{{ isset($user->username) ? $user->username : old('username') }}"
                           required disabled>

                    @error('username')
                    <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password" class="control-label">{{ 'Password (Kosongkan untuk tidak merubah)' }}</label>

                <div class="col-md-12">
                    <input type="password" class="form-control form-control-line"
                           name='password' id="password">
                    @error('password')
                    <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
            </div>

            <div
                class="mb-3 form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                <label for="password_confirmation"
                       class="control-label">{{ 'Password Confirmation' }}</label>

                <div class="col-md-12">
                    <input type="password" class="form-control form-control-line"
                           name='password_confirmation'
                           id="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
            </div>

            <div
                class="mb-3 form-group {{ $errors->has('foto_profile') ? 'has-error' : ''}}">
                <label for="foto_profile"
                       class="control-label">{{ 'Foto Profile' }}</label>

                <div class="col-md-12">
                    <input type="file" class="form-control form-control-line"
                           name='foto_profile'
                           id="foto_profile">
                    @error('foto_profile')
                    <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
                <p>

            </div>

            <div
                class="mb-3 form-group {{ $errors->has('foto_profile') ? 'has-error' : ''}}">

                <img src="{{ url(auth()->user()->foto_profile ?? "img/anonymouse.png") }}" width="150" />
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
