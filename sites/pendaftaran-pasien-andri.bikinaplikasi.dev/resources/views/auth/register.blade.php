<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Registrasi | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('') }}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ url('') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ url('') }}/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Selamat Datang!</h5>
                                    <p>Ini adalah form khusus pasien untuk registrasi dan mendapatkan no antrian.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ url('') }}/avatar/png/people-together.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="index.html">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ url('') }}/assets/images/logo.svg" alt=""
                                                     class="rounded-circle"
                                                     height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            @if(session()->has("error"))
                                <div class="alert alert-danger text-white" role="alert"
                                     style='text-align: center; color: red; weight: bolder; '>
                                    {{ session()->get("error") }}
                                </div>
                            @endif
                            
                            @if(session()->has("success"))
                                <div class="alert alert-success text-white" role="alert"
                                     style='text-align: center; weight: bolder; '>
                                    {{ session()->get("success") }}
                                </div>
                            @endif

                            <form action="{{ url('/pasien') }}" method="post" name="login_form">
                                <input placeholder="sudah_pernah_berobat"
                                       class="form-control form-control-line @error('sudah_pernah_berobat') is-invalid @enderror"
                                       name="sudah_pernah_berobat" type="hidden" id="sudah_pernah_berobat"
                                       value="sudah_pernah_berobat">

                                <h1 class="text-center">Sudah pernah berobat? Input Nomor Berobat</h1>
                                <div class="text-muted text-center mb-4">
                                </div>
                                <div class="form-group">
                                    <label>Mau Berobat Ke Poli Mana?</label>

                                    <select class="form-control form-control-line" name="poli_id">
                                        @foreach(\App\Models\Poli::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_poli }}</option>
                                        @endforeach
                                    </select>

                                    @error('poli')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <label>Nomor Berobat</label>
                                    <input placeholder="nomor_berobat"
                                           class="form-control form-control-line @error('nomor_berobat') is-invalid @enderror"
                                           name="nomor_berobat" type="number" id="nomor_berobat"
                                           value="{{ isset($pasien->nomor_berobat) ? $pasien->nomor_berobat : old('nomor_berobat') }}">

                                    @error('nomor_berobat')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Keluhan Penyakit</label>
                                    <input placeholder="keluhan_penyakit"
                                           class="form-control form-control-line @error('keluhan_penyakit') is-invalid @enderror"
                                           name="keluhan_penyakit" type="text" id="keluhan_penyakit"
                                           value="{{ isset($pasien->keluhan_penyakit) ? $pasien->keluhan_penyakit : old('keluhan_penyakit') }}">

                                    @error('keluhan_penyakit')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Status BPJS</label>

                                    <select class="form-control form-control-line" name="bpjs">
                                        @foreach(['BPJS', 'NON BPJS'] as $key => $item)
                                            <option value="{{$item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>

                                    @error('bpjs')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Ambil
                                    Antrian
                                </button>
                            </form>

                            <hr>

                            <form action="{{ url('/pasien') }}" method="post" name="login_form">
                                <h1 class="text-center">Registrasi Pasien</h1>
                                <div class="text-muted text-center mb-4">
                                </div>

                                <div class="form-group">
                                    <label>Nomor Berobat</label>
                                    <input placeholder="nomor_berobat"
                                           class="form-control form-control-line @error('nomor_berobat') is-invalid @enderror"
                                           name="nomor_berobat" type="number" id="nomor_berobat"
                                           value="{{ isset($nomor_berobat) ? $nomor_berobat : old('nomor_berobat') }}"
                                           readonly>

                                    @error('nomor_berobat')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input placeholder="nama"
                                           class="form-control form-control-line @error('nama') is-invalid @enderror"
                                           name="nama" type="text" id="nama"
                                           value="{{ isset($pasien->nama) ? $pasien->nama : old('nama') }}">

                                    @error('nama')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Umur</label>
                                    <input placeholder="umur"
                                           class="form-control form-control-line @error('umur') is-invalid @enderror"
                                           name="umur" type="number" id="umur"
                                           value="{{ isset($pasien->umur) ? $pasien->umur : old('umur') }}">

                                    @error('umur')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat"
                                              placeholder="alamat">{{ isset($pasien->alamat) ? $pasien->alamat : old('alamat')}}</textarea>

                                    @error('alamat')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control form-control-line"
                                            id="jenis_kelamin">
                                        @foreach (["Laki - Laki" => "Laki - Laki", "Perempuan" => "Perempuan"] as $optionKey => $optionValue)
                                            <option
                                                value="{{ $optionKey }}" {{ (isset($pasien->jenis_kelamin) && $pasien->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                                        @endforeach
                                    </select>

                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input placeholder="tanggal_lahir"
                                           class="form-control form-control-line @error('tanggal_lahir') is-invalid @enderror"
                                           name="tanggal_lahir" type="date" id="tanggal_lahir"
                                           value="{{ isset($pasien->tanggal_lahir) ? $pasien->tanggal_lahir : old('tanggal_lahir') }}">

                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>No KTP</label>
                                    <input placeholder="no_ktp"
                                           class="form-control form-control-line @error('no_ktp') is-invalid @enderror"
                                           name="no_ktp" type="text" id="no_ktp"
                                           value="{{ isset($pasien->no_ktp) ? $pasien->no_ktp : old('no_ktp') }}">

                                    @error('no_ktp')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>ID Bpjs</label>
                                    <input placeholder="id_bpjs"
                                           class="form-control form-control-line @error('id_bpjs') is-invalid @enderror"
                                           name="id_bpjs" type="text" id="id_bpjs"
                                           value="{{ isset($pasien->id_bpjs) ? $pasien->id_bpjs : old('id_bpjs') }}">

                                    @error('id_bpjs')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button name="registrasi" type="submit"
                                        class="btn btn-primary btn-lg btn-block fw-500 mb-3">Registrasi
                                </button>

                                <a href="{{ route('login') }}"
                                   class="btn btn-outline-primary btn-lg btn-block fw-500 mb-3">Login Admin</a>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ url('') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ url('') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('') }}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ url('') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ url('') }}/assets/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="{{ url('') }}/assets/js/app.js"></script>
</body>

</html>
