@extends("layouts.admin-lte.app")

@section('page') Profile / Edit Profile @endsection

@section("content")
    <div class="row page-titles">

        <div class="col-sm-6" style='margin-bottom: 20px;'>
            <span class='label label-info'> Terakhir Diperbarui: {{ toIdTime($user->created_at) }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material"
                action="{{ url(route('user.update', ['user' => $user->id])) }}" method="post"
                enctype="multipart/form-data">
                @method('put')
                @csrf

                @if(in_array($user->level, ['siswa', '']) && auth()->user()->level == "tu")
                <div class="form-group">
                    <label class="col-md-12">Kelas</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='kelas_id' @if(($user->level ==
                            auth()->user()->level || $user->level == "guru") xor $errors->has('kelas_id'))
                            disabled @endif>
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
                            value='{{ old('nama') == "" ? $user->nama : old('nama') }}' name='nama'>

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
                            value='{{ old('email') == "" ? $user->email : old('email') }}' name='email'>

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
                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line"
                            name='no_hp' value='{{ old('no_hp') == "" ? $user->no_hp : old('no_hp') }}'>

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

                @if(in_array($user->level, ['guru', 'siswa']) && in_array(auth()->user()->level, ['tu']))
                <div class="form-group">
                    <label class="col-md-12">Level</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='level' @if($user->level ==
                            auth()->user()->level) disabled @endif>
                            @if($user->level == "tu" && auth()->user()->level == "tu")
                            <option @if($user->level == "tu") selected @endif>admin</option>
                            @else
                            <option @if(($user->level == "siswa" || old('level') == 'siswa')) selected
                                @endif>siswa</option>
                            <option @if(($user->level == "guru" || old('level') == 'guru')) selected @endif
                                >guru</option>
                            @endif
                        </select>

                        @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @endif

                @if(in_array($user->level, ['guru', 'siswa']) && in_array(auth()->user()->level, ['tu']))
                <div class="form-group">
                    <label class="col-sm-12">Status</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='status' @if($user->level ==
                            auth()->user()->level) disabled @endif>
                            @if($user->level == "tu" && auth()->user()->level == "tu")
                            <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                @endif>aktif</option>
                            @elseif($user->status == "guru" && auth()->user()->status == "tu")
                            <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                @endif>aktif</option>
                            <option @if($user->status == "tidak aktif" || old('status') == 'tidak aktif'))
                                selected @endif>tidak aktif</option>
                            @else
                            <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                @endif>aktif</option>
                            <option @if($user->status == "tidak aktif" || old('status') == 'tidak aktif'))
                                selected @endif>tidak aktif</option>
                            <option @if($user->status == "pindah" || old('status') == 'pindah')) selected
                                @endif>pindah</option>
                            @endif
                        </select>

                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @endif

                @if(in_array($user->level, ['guru', 'siswa']))
                <div class="form-group">
                    <label class="col-md-12">No Identitas</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='no_identitas'
                            value='{{ old('no_identitas') == "" ? $user->no_identitas : old('no_identitas') }}'
                            @if($user->level == 'tu') disabled @endif>

                        @error('no_identitas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
