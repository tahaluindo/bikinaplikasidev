@extends('layouts.app')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>User</h2>
                    </div>
                    <div class="col-lg-6 breadcrumb-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </a></li>
                            <li class="breadcrumb-item">User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-6 xl-100 box-col-12">
                    <div class="card">
                        <div class="card-header no-border">
                            <ul class="creative-dots">
                                <li class="bg-primary big-dot"></li>
                                <li class="bg-secondary semi-big-dot"></li>
                                <li class="bg-warning medium-dot"></li>
                                <li class="bg-info semi-medium-dot"></li>
                                <li class="bg-secondary semi-small-dot"></li>
                                <li class="bg-primary small-dot"></li>
                            </ul>

                        </div>
                        <div class="card-body pt-0">

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

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
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

                                @if(auth()->user()->level == 'Admin')
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
                                @endif

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head21" title="Copy"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('user/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('user/create') }}";
        var columnOrders = [0];
        var urlSearch = "{{ url('user') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection