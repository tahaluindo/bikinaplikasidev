@extends("layouts.admin-lte.app")

@section('page') Tambah Akun @endsection

@section("content")

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">

                    <a class="btn btn-info" href="?action=tambah_siswa">Tambah Siswa</a>
                    <a class="btn btn-info" href="?action=tambah_guru">Tambah Guru</a>

                    <p>

                    @if(in_array(request()->action, ['tambah_siswa']) || request()->action == null)
                        <form class="form-horizontal form-material"
                              action="{{ url(route('user.store')) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='kelas_id'
                                            @if(in_array(old('level'), ['guru'])) disabled @endif>
                                        <option value=''></option>
                                        @foreach($kelass as $kelas)
                                            <option value="{{ $kelas->id }}"
                                                    @if(old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
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
                                    <input type="text"
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
                                           name='no_hp' value='{{ old('no_hp') }}'>

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
                                    <input type="password" class="form-control form-control-line" name='password'
                                           value="">

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
                                        <option @if(old('status') == 'keluar') selected @endif>keluar</option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

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
                                           value='{{ old('nipd') }}' type="number" min="0">

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
                                           value='{{ old('tempat_lahir') }}'>

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
                                    <input type="date" class="form-control form-control-line" name='tanggal_lahir'
                                           value='{{ old('tanggal_lahir') }}'>

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
                                           value='{{ old('nik') }}'>

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
                                        <option @if(old('agama') == 'Islam') selected @endif>Islam</option>
                                        <option @if(old('agama') == 'Kristen Protestan') selected @endif>Kristen
                                            Protestan
                                        </option>
                                        <option @if(old('agama') == 'Kristen Katolik') selected @endif>Kristen
                                            Katolik
                                        </option>
                                        <option @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                                        <option @if(old('agama') == 'Budha') selected @endif>Budha</option>
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
                                           value='{{ old('alamat') }}' name='alamat'>

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
                                           value='{{ old('rt') }}' name='rt'>

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
                                           value='{{ old('rw') }}' name='rw'>

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
                                           value='{{ old('dusun') }}' name='dusun'>

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
                                           value='{{ old('kelurahan') }}' name='kelurahan'>

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
                                           value='{{ old('kode_pos') }}' name='kode_pos'>

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
                                            @if(old('alat_transportasi') == 'Mobil') selected @endif>
                                            Mobil
                                        </option>

                                        <option
                                            @if(old('alat_transportasi') == 'Motor') selected @endif>
                                            Motor
                                        </option>

                                        <option
                                            @if(old('alat_transportasi') == 'Bus Antar Jemput') selected @endif>
                                            Bus Antar Jemput
                                        </option>

                                        <option
                                            @if(old('alat_transportasi') == 'Lainnya') selected @endif>
                                            Lainnya
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
                                           value='{{ old('skhun') }}' name='skhun'>

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
                                        <option @if(old('penerima_kps') == 'Ya') selected @endif>Ya
                                        </option>
                                        <option
                                            @if(old('penerima_kps') == 'Tidak') selected @endif>
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
                                           value='{{ old('no_kps') }}' name='no_kps'>

                                    @error('no_kps')
                                    <span class="invalid-feedback" role="aleno_kps">
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
                                           value='{{ old('nama_ayah') }}' name='nama_ayah'>

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
                                           value='{{ old('tahun_lahir_ayah') }}' name='tahun_lahir_ayah'>

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
                                        <option @if(old('jenjang_pendidikan_ayah') == 'SD') selected @endif>SD
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ayah') == 'SMP') selected @endif>SMP
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ayah') == 'SMA') selected @endif>SMA
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ayah') == 'S1') selected @endif>S1
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ayah') == 'S2') selected @endif>S2
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ayah') == 'S3') selected @endif>S3
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
                                           value='{{ old('pekerjaan_ayah') }}' name='pekerjaan_ayah'>

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
                                           value='{{ old('penghasilan_ayah') }}' name='penghasilan_ayah'>

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
                                           value='{{ old('nik_ayah') }}' name='nik_ayah'>

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
                                           value='{{ old('nama_ibu') }}' name='nama_ibu'>

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
                                           value='{{ old('tahun_lahir_ibu') }}' name='tahun_lahir_ibu'>

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
                                           value='{{ old('jenjang_pendidikan_ibu') }}'
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
                                        <option @if(old('jenjang_pendidikan_ibu') == 'SD') selected @endif>SD
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ibu') == 'SMP') selected @endif>SMP
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ibu') == 'SMA') selected @endif>SMA
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ibu') == 'S1') selected @endif>S1
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ibu') == 'S2') selected @endif>S2
                                        </option>
                                        <option @if(old('jenjang_pendidikan_ibu') == 'S3') selected @endif>S3
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
                                           value='{{ old('pekerjaan_ibu') }}' name='pekerjaan_ibu'>

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
                                           value='{{ old('penghasilan_ibu') }}' name='penghasilan_ibu'>

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
                                           value='{{ old('nik_ibu') }}' name='nik_ibu'>

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
                                           value='{{ old('no_peserta_ujian_nasional') }}'
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
                                           value='{{ old('no_seri_ijazah') }}' name='no_seri_ijazah'>

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
                                           value='{{ old('nomor_kip') }}' name='nomor_kip'>

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
                                           value='{{ old('nama_di_kip') }}' name='nama_di_kip'>

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
                                           value='{{ old('nomor_kks') }}' name='nomor_kks'>

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
                                           value='{{ old('bank') }}' name='bank'>

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
                                           value='{{ old('nomor_rekening_bank') }}' name='nomor_rekening_bank'>

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
                                           value='{{ old('rekening_atas_nama') }}' name='rekening_atas_nama'>

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
                                        <option @if(old('layak_pip') == 'Ya') selected @endif>Ya
                                        </option>
                                        <option
                                            @if(old('layak_pip') == 'Tidak') selected @endif>
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
                                           value='{{ old('alasan_layak_pip') }}' name='alasan_layak_pip'>

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
                                           value='{{ old('kebutuhan_khusus') }}' name='kebutuhan_khusus'>

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
                                           value='{{ old('sekolah_asal') }}' name='sekolah_asal'>

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
                                           value='{{ old('anak_ke_berapa') }}' name='anak_ke_berapa'>

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
                                           value='{{ old('lintang') }}' name='lintang'>

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
                                           value='{{ old('bujur') }}' name='bujur'>

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
                                           value='{{ old('no_kk') }}' name='no_kk'>

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
                                           value='{{ old('berat_badan') }}' name='berat_badan'>

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
                                           value='{{ old('lingkar_kepala') }}' name='lingkar_kepala'>

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
                                           value='{{ old('jumlah_saudara_kandung') }}'
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
                                           value='{{ old('jarak_rumah_kesekolah') }}' name='jarak_rumah_kesekolah'>

                                    @error('jarak_rumah_kesekolah')
                                    <span class="invalid-feedback" role="jarak_rumah_kesekolah">
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


                    @elseif(in_array(request()->action, ['tambah_guru']))
                        <form class="form-horizontal form-material"
                              action="{{ url(route('user.store')) }}" method="post"
                              enctype="multipart/form-data">
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
                                    <input type="text"
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
                                           name='no_hp' value='{{ old('no_hp') }}'>

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
                                    <input type="password" class="form-control form-control-line" name='password'
                                           value="">

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
                                        <option @if(old('status') == 'keluar') selected @endif>keluar</option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">NIP</label>
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
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input class="form-control form-control-line" name='nama'
                                           value='{{ old('nama') }}'>

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
                                           value='{{ old('nuptk') }}'>

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
                                           value='{{ old('status_kepegawaian') }}'>

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
                                           value='{{ old('jenis_ptk') }}'>

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
                                           value='{{ old('gelar_depan') }}'>

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
                                           value='{{ old('gelar_belakang') }}'>

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
                                        <option @if(old('jenjang') == 'D3') selected @endif>D3</option>
                                        <option @if(old('jenjang') == 'S1') selected @endif>S1</option>
                                        <option @if(old('jenjang') == 'S2') selected @endif>S2</option>
                                        <option @if(old('jenjang') == 'S3') selected @endif>S3</option>
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
                                           value='{{ old('jurusan_prodi') }}'>

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
                                           value='{{ old('sertifikasi') }}'>

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
                                           value='{{ old('tamat_kerja') }}'>

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
                                           value='{{ old('tugas_tambahan') }}'>

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
                                           value='{{ old('mengajar') }}'>

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
                                           value='{{ old('jam_tugas_tambahan') }}'>

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
                                           value='{{ old('jjm') }}'>

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
                                           value='{{ old('total_jjm') }}'>

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
                                           value='{{ old('siswa') }}'>

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
                                           value='{{ old('kompetensi') }}'>

                                    @error('kompetensi')
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
