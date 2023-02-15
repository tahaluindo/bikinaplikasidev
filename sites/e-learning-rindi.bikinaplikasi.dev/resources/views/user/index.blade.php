@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-sm-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                <span>
                    <a id='dropdownGuru' class="btn pull-right hidden-sm-down bg-light dropdown-toggle"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">{{ Str::ucfirst(request()->user ?? 'Admin') }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownGuru">
                        @if(request()->user != 'admin')
                        <a class="dropdown-item" href="{{ url('user?user=admin') }}">Admin</a>
                        @endif

                        @if(request()->user != 'guru')
                        <a class="dropdown-item" href="{{ url('user?user=guru') }}">Guru</a>
                        @endif

                        @if(request()->user != 'siswa')
                        <a class="dropdown-item" href="{{ url('user?user=siswa') }}">Siswa</a>
                        @endif
                    </div>
                </span>
                <a href="{{ url('user/import') }}" class="btn pull-right hidden-sm-down bg-light">
                    Import</a>
                <a href="{{ url('user/download_format') }}" class="btn pull-right hidden-sm-down bg-light">
                    Download Format</a>
                <a href="{{ url('user/export') }}" class="btn pull-right hidden-sm-down bg-light">
                    Export</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        @if(request()->user == 'admin' || !request()->user)
                            @include('user.admin.index', ['users' => $users])

                        @elseif(request()->user == 'guru')
                            @include('user.guru.index', ['users' => $users])

                        @elseif(request()->user == 'siswa')
                            @include('user.siswa.index', ['users' => $users])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection