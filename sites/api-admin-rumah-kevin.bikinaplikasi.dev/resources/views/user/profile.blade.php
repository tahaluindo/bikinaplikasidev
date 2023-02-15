@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">User</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <div class="card px-1">
                            <div class="card-body">
                                @if(session()->has("error"))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get("error") }}
                                    </div>
                                @elseif(session()->has("success"))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get("success") }}
                                    </div>
                                @elseif(session()->has("warning"))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session()->get("warning") }}
                                    </div>
                                @endif

                                <form class="form-horizontal form-material"
                                      action="{{ route('user.profile.update', auth()->id()) }}" method="post"
                                      enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                        <label for="nama" class="control-label">{{ 'Name' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="nama"
                                                   class="form-control form-control-line @error('nama') is-invalid @enderror"
                                                   name="nama" type="text" id="nama"
                                                   value="{{ isset($user->nama) ? $user->nama : old('nama') }}"
                                                   required>

                                            @error('nama')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                        <label for="email" class="control-label">{{ 'Email' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="email"
                                                   class="form-control form-control-line @error('email') is-invalid @enderror"
                                                   name="email" type="email" id="email"
                                                   value="{{ isset($user->email) ? $user->email : old('email') }}"
                                                   required>

                                            @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                        <label for="password" class="control-label">{{ 'Password' }}</label>

                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line"
                                                   name='password' id="password" required>
                                            @error('password')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div
                                        class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                        <label for="password_confirmation"
                                               class="control-label">{{ 'Password Confirmation' }}</label>

                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line"
                                                   name='password_confirmation'
                                                   id="password_confirmation" required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
