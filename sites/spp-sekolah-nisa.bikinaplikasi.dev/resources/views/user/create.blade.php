@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material"
                            action="{{ route('user.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Angkatan (Tidak Ada Khusus Tambah Admin)</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="{{ date('Y') }}" class="form-control form-control-line @error('angkatan') is-invalid @enderror"
                                    value='{{ old('angkatan') == "" ? date('Y') : old('angkatan') }}' name='angkatan' min='{{ date('Y') - 10 }}' max='{{ date('Y') }}'>

                                    @error('angkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='kelas_id'>
                                        @can('viewAny', auth()->user())
                                        <option value="" @if(old('kelas_id') == '') selected @endif>Tidak Ada (Khusus Tambah Admin)</option>
                                        @endcan
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" @if(old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe"
                                        class="form-control form-control-line @error('nama') is-invalid @enderror"
                                        value='{{ old('nama') }}' name='nama'>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @can('viewAny', auth()->user())
                            <div class="form-group">
                                <label class="col-md-12">Email (Tidak Ada Khusus Tambah Siswa)</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com"
                                        class="form-control form-control-line" id="example-email"
                                        value='{{ old('email') }}' name='email'>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Password (Tidak Ada Khusus Tambah Siswa)</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name='password'
                                        value="{{ old('password') }}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Level</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='level'>
                                        <option value="admin" @if(old('level') == 'admin') selected @endif>Admin</option>
                                        <option value="siswa" @if(old('level') == 'siswa') selected @endif>Siswa</option>
                                    </select>
                                    
                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endcan

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
    @endsection
