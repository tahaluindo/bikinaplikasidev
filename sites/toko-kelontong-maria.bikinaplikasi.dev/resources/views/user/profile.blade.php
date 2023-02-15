@extends('layouts.app')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header" style="margin-bottom: 0px;">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('') }}"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">User</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>User</h5>
                                        </div>
                                        <div class="card-body px-3 py-3">
                                            <div class="table-stats order-table ov-h table-responsive"
                                                 style="padding-left: 28px; padding-top: 20px;">

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
                                                      action="{{ route('user.profile.update', auth()->id()) }}"
                                                      method="post"
                                                      enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf

                                                    <div
                                                        class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
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

                                                    <div
                                                        class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
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

                                                    <div
                                                        class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                                        <label for="password"
                                                               class="control-label">{{ 'Password' }}</label>

                                                        <div class="col-md-12">
                                                            <input type="password"
                                                                   class="form-control form-control-line"
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
                                                            <input type="password"
                                                                   class="form-control form-control-line"
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
                                                            <button class="btn btn-success" type="submit">Simpan
                                                            </button>
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
                </div>
            </div>
        </div>
    </div>

@endsection