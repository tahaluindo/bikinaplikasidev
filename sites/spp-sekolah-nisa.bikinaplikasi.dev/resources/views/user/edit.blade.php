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
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            action="{{ route('user.update', ['user' => $user->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            @if($user->level != 'superadmin' && $user->level != 'admin')
                            <div class="form-group">
                                <label class="col-md-12">Angkatan</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="{{ date('Y') }}" class="form-control form-control-line @error('angkatan') is-invalid @enderror"
                                    value='{{ old('angkatan') == "" ? $user->angkatan : old('angkatan') }}' name='angkatan' min='{{ date('Y') - 10 }}' max='{{ date('Y') }}'>

                                    @error('angkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            @if($user->level != 'superadmin')
                            @if($user->level != 'admin')
                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='kelas_id'>
                                        @can('viewAny', auth()->user())
                                        <option value="" @if(old('kelas_id') == '') selected @endif>Tidak Ada (Khusus Tambah Admin)</option>
                                        @endcan
                                        
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" @if($user->kelas_id == $kelas->id ||
                                            old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            @endif

                            <div class="form-group">
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe"
                                        class="form-control form-control-line @error('nama') is-invalid @enderror"
                                        value='{{ old('nama') == "" ? $user->nama : old('nama') }}' name='nama'>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            @can('viewAny', auth()->user())
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com"
                                        class="form-control form-control-line" id="example-email"
                                        value='{{ old('email') == "" ? $user->email : old('email') }}' name='email'>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endcan

                            @can('viewAny', auth()->user())
                            @if($user->level != 'superadmin')
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name='password'
                                        value="">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            @endcan

                            {{-- kalo user edit profile sendiri --}}
                            @if($user->id == auth()->user()->id)
                            <div class="form-group">
                                <label class="col-md-12">Password </label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name='password'
                                        value="">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            {{-- khusus admin utama bisa tambah admin & siswa, yg lainya cuma tambah siswa --}}
                            @can('viewAny', auth()->user())
                            @if($user->level != 'superadmin')
                            <div class="form-group">
                                <label class="col-md-12">Level</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='level'>
                                        <option value="admin" @if(old('level') == 'admin' || $user->level == 'admin') selected @endif>Admin</option>
                                        <option value="siswa" @if(old('level') == 'siswa' || $user->level == 'siswa') selected @endif>Siswa</option>
                                    </select>
                                    
                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
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
