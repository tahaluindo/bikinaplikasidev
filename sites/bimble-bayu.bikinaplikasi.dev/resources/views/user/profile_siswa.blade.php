@extends('layouts.app')

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function() {
        var kelas_selector = $('#kelas_id')
        var kelas_selector_option = $('#kelas_id option');
        $(document).on('change', '#jenjang_id', function(e) {
            var nama_jenjang = $('#jenjang_id').find("option:selected").text().trim();

            kelas_selector.empty();
            if (nama_jenjang == "SD") {

                let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                    return (item.label == "I" || item.label == "II" ||
                        item.label == "III" || item.label == "IV" || item.label ==
                        "V" || item.label == "VI")
                })

                $.each(kelas_selector_filtered, (index, item) => {
                    kelas_selector.append(item.outerHTML);
                });
            } else if (nama_jenjang == "SMP") {
                let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                    return (item.label == "VII" || item.label ==
                        "VIII" || item.label == "IX")
                })

                $.each(kelas_selector_filtered, (index, item) => {
                    kelas_selector.append(item.outerHTML);
                });
            } else if (nama_jenjang == "SMA") {
                let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                    return (item.label == "X" || item.label == "XI" ||
                        item.label == "XII")
                })

                $.each(kelas_selector_filtered, (index, item) => {
                    kelas_selector.append(item.outerHTML);
                });
            }
        });
    });
</script>


<style>
    .invalid-feedback {
        display: block;
    }
</style>

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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-home">
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

                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                            @elseif(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @elseif(session()->has('warning'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session()->get('warning') }}
                                </div>
                            @endif

                            <form class="form-horizontal form-material"
                                action="{{ route('user.profile.update', auth()->id()) }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label>Jenjang</label>
                                    <select name="jenjang_id" class="form-control form-control-line" id="jenjang_id"
                                        required="">
                                        <option value="">--Pilih Jenjang--</option>
                                        @foreach ($jenjang as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('jenjang_id') == $item->id || $user->siswa->jenjang_id == $item->id) selected @endif>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenjang_id')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas_id" class="form-control form-control-line" id="kelas_id"
                                        required="">
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('kelas_id') == $item->id || $user->siswa->kelas_id == $item->id) selected @endif>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label>Email</label>

                                    <input placeholder="email" class="form-control form-control-line " name="email"
                                        type="email" id="email"
                                        value="{{ old('email') == '' ? $user->email : old('email') }}" required="">

                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>

                                    <input placeholder="password" class="form-control form-control-line " name="password"
                                        type="password" id="password" value="{{ old('password') }}" required="">

                                    @error('password')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label>Nama</label>

                                    <input placeholder="nama" class="form-control form-control-line " name="nama"
                                        type="text" id="nama"
                                        value="{{ old('nama') == '' ? $user->siswa->nama : old('nama') }}" required="">

                                    @error('nama')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>

                                    <input placeholder="tanggal_lahir" class="form-control form-control-line "
                                        name="tanggal_lahir" type="date" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') == '' ? $user->siswa->tanggal_lahir : old('tanggal_lahir') }}"
                                        required="">

                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control form-control-line"
                                        id="jenis_kelamin" required="">
                                        <option value="Laki - Laki" @if (old('jenis_kelamin') == 'Laki - Laki' || $user->siswa->jenis_kelamin == 'Laki - Laki') selected @endif>
                                            Laki - Laki
                                        </option>
                                        <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan' || $user->siswa->jenis_kelamin == 'Perempuan') selected @endif>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control form-control-line" id="agama"
                                        required="">
                                        <option value="Islam" @if (old('agama') == 'Islam' || $user->siswa->agama == 'Islam') selected @endif>
                                            Islam
                                        </option>
                                        <option value="Kristen Katolik" @if (old('agama') == 'Kristen Katolik' || $user->siswa->agama == 'Kristen Katolik') selected @endif>
                                            Kristen Katolik
                                        </option>
                                        <option value="Kristen Protestan"
                                            @if (old('agama') == 'Kristen Protestan' || $user->siswa->agama == 'Kristen') selected @endif>
                                            Kristen Protestan
                                        </option>
                                        <option value="Hindu" @if (old('agama') == 'Hindu' || $user->siswa->agama == 'Hindu') selected @endif>
                                            Hindu
                                        </option>
                                        <option value="Budha" @if (old('agama') == 'Budha' || $user->siswa->agama == 'Budha') selected @endif>
                                            Budha
                                        </option>
                                    </select>
                                    @error('agama')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat">{{ old('alamat') == '' ? $user->siswa->alamat : old('alamat') }}</textarea>

                                    @error('alamat')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Hp</label>
                                    <input placeholder="no_hp" class="form-control form-control-line " name="no_hp"
                                        type="text" id="no_hp"
                                        value="{{ old('no_hp') == '' ? $user->siswa->no_hp : old('no_hp') }}">

                                    @error('no_hp')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <hr>
                                <strong>Data Orang Tua</strong>

                                <div class="form-group">
                                    <label>Nama Ibu</label>

                                    <input placeholder="nama_ibu" class="form-control form-control-line " name="nama_ibu"
                                        type="text" id="nama_ibu"
                                        value="{{ old('nama_ibu') == '' ? $user->siswa->nama_ibu : old('nama_ibu') }}">

                                    @error('nama_ibu')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan Ibu</label>

                                    <input placeholder="pekerjaan_ibu" class="form-control form-control-line "
                                        name="pekerjaan_ibu" type="text" id="pekerjaan_ibu"
                                        value="{{ old('pekerjaan_ibu') == '' ? $user->siswa->pekerjaan_ibu : old('pekerjaan_ibu') }}">

                                    @error('pekerjaan_ibu')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama Ayah</label>

                                    <input placeholder="nama_ayah" class="form-control form-control-line "
                                        name="nama_ayah" type="text" id="nama_ayah"
                                        value="{{ old('nama_ayah') == '' ? $user->siswa->nama_ayah : old('email') }}">

                                    @error('nama_ayah')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan Ayah</label>

                                    <input placeholder="pekerjaan_ayah" class="form-control form-control-line "
                                        name="pekerjaan_ayah" type="text" id="pekerjaan_ayah"
                                        value="{{ old('pekerjaan_ayah') == '' ? $user->siswa->pekerjaan_ayah : old('pekerjaan_ayah') }}">

                                    @error('pekerjaan_ayah')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Alamat Orang Tua</label>

                                    <input placeholder="alamat_orang_tua" class="form-control form-control-line "
                                        name="alamat_orang_tua" type="text" id="alamat_orang_tua"
                                        value="{{ old('alamat_orang_tua') == '' ? $user->siswa->alamat_orang_tua : old('alamat_orang_tua') }}">

                                    @error('alamat_orang_tua')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>No Hp Orang Tua</label>

                                    <input placeholder="no_hp_orang_tua" class="form-control form-control-line "
                                        name="no_hp_orang_tua" type="text" id="no_hp_orang_tua"
                                        value="{{ old('no_hp_orang_tua') == '' ? $user->siswa->no_hp_orang_tua : old('no_hp_orang_tua') }}">

                                    @error('no_hp_orang_tua')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Berkas (Tidak Wajib)</label><br>
                                    <label for="nama" class="control-label">Berkas Zip (foto
                                        3x4)</label>
                                    <p>
                                        <input placeholder="berkas" class="" name="berkas" type="file"
                                            id="berkas" value="">
                                    </p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head21"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>

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
