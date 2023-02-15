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
                        <label class="col-sm-12">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line" name='status' @if($user->level ==
                            auth()->user()->level) disabled @endif>
                                @if($user->level == "tu" && auth()->user()->level == "tu")
                                    <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                        @endif>aktif
                                    </option>
                                @elseif($user->status == "guru" && auth()->user()->status == "tu")
                                    <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                        @endif>aktif
                                    </option>
                                    <option @if($user->status == "tidak aktif" || old('status') == 'tidak aktif'))
                                            selected @endif>tidak aktif
                                    </option>
                                @else
                                    <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                        @endif>aktif
                                    </option>
                                    <option @if($user->status == "tidak aktif" || old('status') == 'tidak aktif'))
                                            selected @endif>tidak aktif
                                    </option>

                                    <option @if($user->status == "pindah" || old('status') == 'pindah')) selected
                                        @endif>pindah
                                    </option>

                                    <option @if($user->status == "keluar" || old('status') == 'keluar')) selected
                                        @endif>keluar
                                    </option>
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
                        <label class="col-md-12">NISN / NIP</label>
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
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='nama'
                               value='{{ old('nama') == "" ? $user->nama : old('nama') }}'>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nuptk</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='nuptk'
                               value='{{ old('nuptk') == "" ? $user->nuptk : old('nuptk') }}'>

                        @error('nuptk')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Status Kepegawaian</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='status_kepegawaian'
                               value='{{ old('status_kepegawaian') == "" ? $user->status_kepegawaian : old('status_kepegawaian') }}'>

                        @error('status_kepegawaian')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jenis Ptk</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='jenis_ptk'
                               value='{{ old('jenis_ptk') == "" ? $user->jenis_ptk : old('jenis_ptk') }}'>

                        @error('jenis_ptk')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Gelar Depan</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='gelar_depan'
                               value='{{ old('gelar_depan') == "" ? $user->gelar_depan : old('gelar_depan') }}'>

                        @error('gelar_depan')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Gelar Belakang</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='gelar_belakang'
                               value='{{ old('gelar_belakang') == "" ? $user->gelar_belakang : old('gelar_belakang') }}'>

                        @error('gelar_belakang')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Jenjang</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='jenjang'>
                            <option @if(old('jenjang') == 'D3' || $user->agama == "D3") selected @endif>D3</option>
                            <option @if(old('jenjang') == 'S1' || $user->agama == "S1") selected @endif>S1</option>
                            <option @if(old('jenjang') == 'S2' || $user->agama == "S2") selected @endif>S2</option>
                            <option @if(old('jenjang') == 'S3' || $user->agama == "S3") selected @endif>S3</option>
                        </select>

                        @error('jenjang')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jurusan Prodi</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='jurusan_prodi'
                               value='{{ old('jurusan_prodi') == "" ? $user->jurusan_prodi : old('jurusan_prodi') }}'>

                        @error('jurusan_prodi')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Sertifikasi</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='sertifikasi'
                               value='{{ old('sertifikasi') == "" ? $user->sertifikasi : old('sertifikasi') }}'>

                        @error('sertifikasi')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tamat Kerja</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='tamat_kerja'
                               value='{{ old('tamat_kerja') == "" ? $user->tamat_kerja : old('tamat_kerja') }}'>

                        @error('tamat_kerja')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tugas Tambahan</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='tugas_tambahan'
                               value='{{ old('tugas_tambahan') == "" ? $user->tugas_tambahan : old('tugas_tambahan') }}'>

                        @error('tugas_tambahan')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Mengajar</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='mengajar'
                               value='{{ old('mengajar') == "" ? $user->mengajar : old('mengajar') }}'>

                        @error('mengajar')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jam Tugas Tambahan</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='jam_tugas_tambahan'
                               value='{{ old('jam_tugas_tambahan') == "" ? $user->jam_tugas_tambahan : old('jam_tugas_tambahan') }}'>

                        @error('jam_tugas_tambahan')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jjm</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='jjm'
                               value='{{ old('jjm') == "" ? $user->jjm : old('jjm') }}'>

                        @error('jjm')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Total Jjm</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='total_jjm'
                               value='{{ old('total_jjm') == "" ? $user->total_jjm : old('total_jjm') }}'>

                        @error('total_jjm')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Siswa</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='siswa'
                               value='{{ old('siswa') == "" ? $user->siswa : old('siswa') }}'>

                        @error('siswa')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Kompetensi</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='kompetensi'
                               value='{{ old('kompetensi') == "" ? $user->kompetensi : old('kompetensi') }}'>

                        @error('kompetensi')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
