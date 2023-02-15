@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">User</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">


                            <form class="form-horizontal form-material"
                                  action="{{ route('user.profile.update', auth()->id()) }}" method="post"
                                  enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Nama' }}</label>

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
@endsection
