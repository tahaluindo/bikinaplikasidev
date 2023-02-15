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

                <div class="form-group">
                    <label class="col-md-12">NISN</label>
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
                    <label class="col-md-12">Nipd</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='nipd'
                               value='{{ old('nipd') == "" ? $user->nipd : old('nipd') }}' type="number" min="0">

                        @error('nipd')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tempat Lahir</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='tempat_lahir'
                               value='{{ old('tempat_lahir') == "" ? $user->tempat_lahir : old('tempat_lahir') }}'>

                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tanggal Lahir</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='tanggal_lahir'
                               value='{{ old('tanggal_lahir') == "" ? $user->tanggal_lahir : old('tanggal_lahir') }}'>

                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nik</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line" name='nik'
                               value='{{ old('nik') == "" ? $user->nik : old('nik') }}'>

                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Agama</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='agama'>
                            <option  @if(old('agama') == 'Islam' || $user->agama == "Islam") selected @endif>Islam</option>
                            <option @if(old('agama') == 'Kristen Protestan'  || $user->agama == "Kristen Protestan") selected @endif>Kristen
                                Protestan
                            </option>
                            <option @if(old('agama') == 'Kristen Katolik'  || $user->agama == "Kristen Katolik") selected @endif>Kristen
                                Katolik
                            </option>
                            <option @if(old('agama') == 'Hindu'  || $user->agama == "Hindu") selected @endif>Hindu</option>
                            <option @if(old('agama') == 'Budha'  || $user->agama == "Budha") selected @endif>Budha</option>
                        </select>

                        @error('agama')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Alamat</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('alamat') is-invalid @enderror"
                               value='{{ old('alamat') == "" ? $user->alamat : old('alamat') }}' name='alamat'>

                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Rt</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('rt') is-invalid @enderror"
                               value='{{ old('rt') == "" ? $user->rt : old('rt') }}' name='rt'>

                        @error('rt')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Rw</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('rw') is-invalid @enderror"
                               value='{{ old('rw') == "" ? $user->rw : old('rw') }}' name='rw'>

                        @error('rw')
                        <span class="invalid-feedback" role="alerw">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Dusun</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('dusun') is-invalid @enderror"
                               value='{{ old('dusun') == "" ? $user->dusun : old('dusun') }}' name='dusun'>

                        @error('dusun')
                        <span class="invalid-feedback" role="aledusun">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Kelurahan</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('kelurahan') is-invalid @enderror"
                               value='{{ old('kelurahan') == "" ? $user->kelurahan : old('kelurahan') }}' name='kelurahan'>

                        @error('kelurahan')
                        <span class="invalid-feedback" role="alekelurahan">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Kode Pos</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('kode_pos') is-invalid @enderror"
                               value='{{ old('kode_pos') == "" ? $user->kode_pos : old('kode_pos') }}' name='kode_pos'>

                        @error('kode_pos')
                        <span class="invalid-feedback" role="alekode_pos">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Jenis Tinggal</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='jenis_tinggal'>
                            <option @if(old('jenis_tinggal') == 'Islam') selected @endif>Islam
                            </option>
                            <option
                                @if(old('jenis_tinggal') == 'Bersama Orang Tua') selected @endif>
                                Bersama Orang Tua
                            </option>
                            <option
                                @if(old('jenis_tinggal') == 'Tidak Bersama Orang Tua') selected @endif>
                                Tidak Bersama Orang Tua
                            </option>
                        </select>

                        @error('jenis_tinggal')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-12">Alat transportasi</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='alat_transportasi'>
                            <option
                                @if(old('alat_transportasi') == 'Bersama Orang Tua'  || $user->agama == "Bersama Orang Tua") selected @endif>
                                Bersama Orang Tua
                            </option>
                            <option
                                @if(old('alat_transportasi') == 'Tidak Bersama Orang Tua'  || $user->agama == "Tidak Bersama Orang Tua") selected @endif>
                                Tidak Bersama Orang Tua
                            </option>
                        </select>

                        @error('alat_transportasi')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Skhun</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('skhun') is-invalid @enderror"
                               value='{{ old('skhun') == "" ? $user->skhun : old('skhun') }}' name='skhun'>

                        @error('skhun')
                        <span class="invalid-feedback" role="aleskhun">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Penerima Kps</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='penerima_kps'>
                            <option @if(old('penerima_kps') == 'Ya'  || $user->agama == "Ya") selected @endif>Ya
                            </option>
                            <option
                                @if(old('penerima_kps') == 'Tidak'  || $user->agama == "Tidak") selected @endif>
                                Tidak
                            </option>
                        </select>

                        @error('penerima_kps')
                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Kps</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('no_kps') is-invalid @enderror"
                               value='{{ old('no_kps') == "" ? $user->no_kps : old('no_kps') }}' name='no_kps'>

                        @error('no_kps')
                        <span class="invalid-feedback" role="no_kps">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama Ayah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nama_ayah') is-invalid @enderror"
                               value='{{ old('nama_ayah') == "" ? $user->nama_ayah : old('nama_ayah') }}' name='nama_ayah'>

                        @error('nama_ayah')
                        <span class="invalid-feedback" role="alenama_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tahun lahir ayah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('tahun_lahir_ayah') is-invalid @enderror"
                               value='{{ old('tahun_lahir_ayah') == "" ? $user->tahun_lahir_ayah : old('tahun_lahir_ayah') }}' name='tahun_lahir_ayah'>

                        @error('tahun_lahir_ayah')
                        <span class="invalid-feedback" role="aletahun_lahir_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jenjang Pendidikan Ayah</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='jenjang_pendidikan_ayah'>
                            <option @if(old('jenjang_pendidikan_ayah') == 'SD'  || $user->agama == "SD") selected @endif>SD
                            </option>
                            <option @if(old('jenjang_pendidikan_ayah') == 'SMP'  || $user->agama == "SMP") selected @endif>SMP
                            </option>
                            <option @if(old('jenjang_pendidikan_ayah') == 'SMA' || $user->agama == "SMA") selected @endif>SMA
                            </option>
                            <option @if(old('jenjang_pendidikan_ayah') == 'S1' || $user->agama == "S1") selected @endif>S1
                            </option>
                            <option @if(old('jenjang_pendidikan_ayah') == 'S2' || $user->agama == "S2") selected @endif>S2
                            </option>
                            <option @if(old('jenjang_pendidikan_ayah') == 'S3' || $user->agama == "S3") selected @endif>S3
                            </option>
                        </select>

                        @error('jenjang_pendidikan_ayah')
                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Pekerjaan Ayah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('pekerjaan_ayah') is-invalid @enderror"
                               value='{{ old('pekerjaan_ayah') == "" ? $user->pekerjaan_ayah : old('pekerjaan_ayah') }}' name='pekerjaan_ayah'>

                        @error('pekerjaan_ayah')
                        <span class="invalid-feedback" role="pekerjaan_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Penghasilan Ayah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('penghasilan_ayah') is-invalid @enderror"
                               value='{{ old('penghasilan_ayah') == "" ? $user->penghasilan_ayah : old('penghasilan_ayah') }}' name='penghasilan_ayah'>

                        @error('penghasilan_ayah')
                        <span class="invalid-feedback" role="penghasilan_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nik Ayah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nik_ayah') is-invalid @enderror"
                               value='{{ old('nik_ayah') == "" ? $user->nik_ayah : old('nik_ayah') }}' name='nik_ayah'>

                        @error('nik_ayah')
                        <span class="invalid-feedback" role="nik_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Nama Ibu</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nama_ibu') is-invalid @enderror"
                               value='{{ old('nama_ibu') == "" ? $user->nama_ibu : old('nama_ibu') }}' name='nama_ibu'>

                        @error('nama_ibu')
                        <span class="invalid-feedback" role="nik_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tahun Lahir Ibu</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('tahun_lahir_ibu') is-invalid @enderror"
                               value='{{ old('tahun_lahir_ibu') == "" ? $user->tahun_lahir_ibu : old('tahun_lahir_ibu') }}' name='tahun_lahir_ibu'>

                        @error('tahun_lahir_ibu')
                        <span class="invalid-feedback" role="nik_ayah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jenjang Pendidikan Ibu</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('jenjang_pendidikan_ibu') is-invalid @enderror"
                               value='{{ old('jenjang_pendidikan_ibu') == "" ? $user->jenjang_pendidikan_ibu : old('jenjang_pendidikan_ibu') }}'
                               name='jenjang_pendidikan_ibu'>

                        @error('jenjang_pendidikan_ibu')
                        <span class="invalid-feedback" role="nik_ayah">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jenjang Pendidikan Ibu</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='jenjang_pendidikan_ibu'>
                            <option @if(old('jenjang_pendidikan_ibu') == 'SD' || $user->agama == "SD") selected @endif>SD
                            </option>
                            <option @if(old('jenjang_pendidikan_ibu') == 'SMP' || $user->agama == "SMP") selected @endif>SMP
                            </option>
                            <option @if(old('jenjang_pendidikan_ibu') == 'SMA' || $user->agama == "SMA") selected @endif>SMA
                            </option>
                            <option @if(old('jenjang_pendidikan_ibu') == 'S1' || $user->agama == "S1") selected @endif>S1
                            </option>
                            <option @if(old('jenjang_pendidikan_ibu') == 'S2' || $user->agama == "S2") selected @endif>S2
                            </option>
                            <option @if(old('jenjang_pendidikan_ibu') == 'S3' || $user->agama == "S3") selected @endif>S3
                            </option>
                        </select>

                        @error('jenjang_pendidikan_ibu')
                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Pekerjaan Ibu</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('pekerjaan_ibu') is-invalid @enderror"
                               value='{{ old('pekerjaan_ibu') == "" ? $user->pekerjaan_ibu : old('pekerjaan_ibu') }}' name='pekerjaan_ibu'>

                        @error('pekerjaan_ibu')
                        <span class="invalid-feedback" role="pekerjaan_ibu">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Penghasilan Ibu</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('penghasilan_ibu') is-invalid @enderror"
                               value='{{ old('penghasilan_ibu') == "" ? $user->penghasilan_ibu : old('penghasilan_ibu') }}' name='penghasilan_ibu'>

                        @error('penghasilan_ibu')
                        <span class="invalid-feedback" role="penghasilan_ibu">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nik Ibu</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nik_ibu') is-invalid @enderror"
                               value='{{ old('nik_ibu') == "" ? $user->nik_ibu : old('nik_ibu') }}' name='nik_ibu'>

                        @error('nik_ibu')
                        <span class="invalid-feedback" role="nik_ibu">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Peserta Ujian Nasional</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('no_peserta_ujian_nasional') is-invalid @enderror"
                               value='{{ old('no_peserta_ujian_nasional') == "" ? $user->no_peserta_ujian_nasional : old('no_peserta_ujian_nasional') }}'
                               name='no_peserta_ujian_nasional'>

                        @error('no_peserta_ujian_nasional')
                        <span class="invalid-feedback" role="no_peserta_ujian_nasional">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">No Seri Ijazah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('no_seri_ijazah') is-invalid @enderror"
                               value='{{ old('no_seri_ijazah') == "" ? $user->no_seri_ijazah : old('no_seri_ijazah') }}' name='no_seri_ijazah'>

                        @error('no_seri_ijazah')
                        <span class="invalid-feedback" role="no_seri_ijazah">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Penerima Kip</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='penerima_kip'>
                            <option @if(old('penerima_kip') == 'Ya') selected @endif>Ya
                            </option>
                            <option
                                @if(old('penerima_kip') == 'Tidak') selected @endif>
                                Tidak
                            </option>
                        </select>

                        @error('penerima_kip')
                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nomor kip</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nomor_kip') is-invalid @enderror"
                               value='{{ old('nomor_kip') == "" ? $user->nomor_kip : old('nomor_kip') }}' name='nomor_kip'>

                        @error('nomor_kip')
                        <span class="invalid-feedback" role="nomor_kip">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama di kip</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nama_di_kip') is-invalid @enderror"
                               value='{{ old('nama_di_kip') == "" ? $user->nama_di_kip : old('nama_di_kip') }}' name='nama_di_kip'>

                        @error('nama_di_kip')
                        <span class="invalid-feedback" role="nama_di_kip">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nomor kks</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nomor_kks') is-invalid @enderror"
                               value='{{ old('nomor_kks') == "" ? $user->nomor_kks : old('nomor_kks') }}' name='nomor_kks'>

                        @error('nomor_kks')
                        <span class="invalid-feedback" role="nomor_kks">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Bank</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('bank') is-invalid @enderror"
                               value='{{ old('bank') == "" ? $user->bank : old('bank') }}' name='bank'>

                        @error('bank')
                        <span class="invalid-feedback" role="bank">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nomor Rekening Bank</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('nomor_rekening_bank') is-invalid @enderror"
                               value='{{ old('nomor_rekening_bank') == "" ? $user->nomor_rekening_bank : old('nomor_rekening_bank') }}' name='nomor_rekening_bank'>

                        @error('nomor_rekening_bank')
                        <span class="invalid-feedback" role="nomor_rekening_bank">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Rekening Atas Nama</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('rekening_atas_nama') is-invalid @enderror"
                               value='{{ old('rekening_atas_nama') == "" ? $user->rekening_atas_nama : old('rekening_atas_nama') }}' name='rekening_atas_nama'>

                        @error('rekening_atas_nama')
                        <span class="invalid-feedback" role="rekening_atas_nama">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Layak Pip</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name='layak_pip'>
                            <option @if(old('layak_pip') == 'Ya' || $user->agama == "Ya") selected @endif>Ya
                            </option>
                            <option
                                @if(old('layak_pip') == 'Tidak' || $user->agama == "Tidak") selected @endif>
                                Tidak
                            </option>
                        </select>

                        @error('layak_pip')
                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Alasan Layak Pip</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('alasan_layak_pip') is-invalid @enderror"
                               value='{{ old('alasan_layak_pip') == "" ? $user->alasan_layak_pip : old('alasan_layak_pip') }}' name='alasan_layak_pip'>

                        @error('alasan_layak_pip')
                        <span class="invalid-feedback" role="alasan_layak_pip">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Kebutuhan Khusus</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('kebutuhan_khusus') is-invalid @enderror"
                               value='{{ old('kebutuhan_khusus') == "" ? $user->kebutuhan_khusus : old('kebutuhan_khusus') }}' name='kebutuhan_khusus'>

                        @error('kebutuhan_khusus')
                        <span class="invalid-feedback" role="alasan_layak_pip">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Sekolah Asal</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('sekolah_asal') is-invalid @enderror"
                               value='{{ old('sekolah_asal') == "" ? $user->sekolah_asal : old('sekolah_asal') }}' name='sekolah_asal'>

                        @error('sekolah_asal')
                        <span class="invalid-feedback" role="alasan_layak_pip">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Anak Ke Berapa</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('anak_ke_berapa') is-invalid @enderror"
                               value='{{ old('anak_ke_berapa') == "" ? $user->anak_ke_berapa : old('anak_ke_berapa') }}' name='anak_ke_berapa'>

                        @error('anak_ke_berapa')
                        <span class="invalid-feedback" role="alasan_layak_pip">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Lintang</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('lintang') is-invalid @enderror"
                               value='{{ old('lintang') == "" ? $user->lintang : old('lintang') }}' name='lintang'>

                        @error('lintang')
                        <span class="invalid-feedback" role="lintang">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Bujur</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('bujur') is-invalid @enderror"
                               value='{{ old('bujur') == "" ? $user->bujur : old('bujur') }}' name='bujur'>

                        @error('bujur')
                        <span class="invalid-feedback" role="bujur">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Kk</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('no_kk') is-invalid @enderror"
                               value='{{ old('no_kk') == "" ? $user->no_kk : old('no_kk') }}' name='no_kk'>

                        @error('no_kk')
                        <span class="invalid-feedback" role="no_kk">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Berat Badan</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('berat_badan') is-invalid @enderror"
                               value='{{ old('berat_badan') == "" ? $user->berat_badan : old('berat_badan') }}' name='berat_badan'>

                        @error('berat_badan')
                        <span class="invalid-feedback" role="berat_badan">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Lingkar Kepala</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('lingkar_kepala') is-invalid @enderror"
                               value='{{ old('lingkar_kepala') == "" ? $user->lingkar_kepala : old('lingkar_kepala') }}' name='lingkar_kepala'>

                        @error('lingkar_kepala')
                        <span class="invalid-feedback" role="lingkar_kepala">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jumlah Saudara Kandung</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('jumlah_saudara_kandung') is-invalid @enderror"
                               value='{{ old('jumlah_saudara_kandung') == "" ? $user->jumlah_saudara_kandung : old('jumlah_saudara_kandung') }}'
                               name='jumlah_saudara_kandung'>

                        @error('jumlah_saudara_kandung')
                        <span class="invalid-feedback" role="jumlah_saudara_kandung">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jarak Rumah Ke Sekolah</label>
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control form-control-line @error('jarak_rumah_kesekolah') is-invalid @enderror"
                               value='{{ old('jarak_rumah_kesekolah') == "" ? $user->jarak_rumah_kesekolah : old('jarak_rumah_kesekolah') }}' name='jarak_rumah_kesekolah'>

                        @error('jarak_rumah_kesekolah')
                        <span class="invalid-feedback" role="jarak_rumah_kesekolah">
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
