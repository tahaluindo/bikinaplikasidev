@extends("layouts.admin-lte.app")

@section('page') Tambah User @endsection

@section("content")

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-block">
                <form class="form-horizontal form-material"
                    action="{{ url(route('user.store')) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="col-md-12">Kelas</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='kelas_id' @if(in_array(old('level'), ['guru'])) disabled @endif>
                                <option value=''></option>
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
                        <label class="col-md-12">Foto</label>
                        <div class="col-md-12">
                            <input type="file"
                                class="form-control form-control-line @error('foto') is-invalid @enderror"
                                name='foto'>

                            @error('foto')
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

                    <div class="form-group">
                        <label class="col-md-12">Email</label>
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
                        <label class="col-md-12">No Hp</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="082282692489" class="form-control form-control-line"
                                name='no_hp' value='{{ old('no_hp') }}' >

                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input type="password" class="form-control form-control-line" name='password' value="">

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
                                <option @if(old('level') == 'siswa') selected @endif>siswa</option>
                                <option @if(old('level') == 'guru') selected @endif >guru</option>
                            </select>

                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line" name='status'>
                                <option @if(old('status') == 'aktif') selected @endif>aktif</option>
                                <option @if(old('status') == 'tidak aktif') selected @endif>tidak aktif</option>
                                <option @if(old('status') == 'pindah') selected @endif>pindah</option>
                            </select>

                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">No Identitas</label>
                        <div class="col-md-12">
                            <input class="form-control form-control-line" name='no_identitas'
                                value='{{ old('no_identitas') }}'>

                            @error('no_identitas')
                            <span class="invalid-feedback" role="alert">
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
@endsection
