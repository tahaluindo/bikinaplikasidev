@extends("layouts.admin-lte.app")

@section('page') Tambah Alternatif @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ route('alternatif.registerStore', ['project' => $project->id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                {{-- ini input khusus untuk halaman register biar bisa bedain dari mana --}}
                <input type="hidden" name="from" value='register'>

                <div class="form-group" style="padding-top: 20px;">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Alternatif x"
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
                    <label class="col-md-12">E-mail</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="1"
                            class="form-control form-control-line @error('email') is-invalid @enderror"
                            value='{{ old('email') }}' name='email' minlength=1 maxlength=999999999999999>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="password" placeholder="password"
                            class="form-control form-control-line @error('password') is-invalid @enderror"
                            value='{{ old('password') }}' name='password' minlength=1 maxlength=999999999999999>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Konfirmasi Password</label>
                    <div class="col-md-12">
                        <input type="password" placeholder="password"
                            class="form-control form-control-line @error('password_confirmation') is-invalid @enderror"
                            value='{{ old('password_confirmation') }}' name='password_confirmation' minlength=1 maxlength=999999999999999>

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Identitas</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="1"
                            class="form-control form-control-line @error('no_identitas') is-invalid @enderror"
                            value='{{ old('no_identitas') }}' name='no_identitas' minlength=1 maxlength=999999999999999>

                        @error('no_identitas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Alamat Siswa</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="1"
                            class="form-control form-control-line @error('alamat_siswa') is-invalid @enderror"
                            value='{{ old('alamat_siswa') }}' name='alamat_siswa' minlength=1 maxlength=999999999999999>

                        @error('alamat_siswa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tanggal Lahir</label>
                    <div class="col-md-12">
                        <input type="date" placeholder="1"
                            class="form-control form-control-line @error('tanggal_lahir') is-invalid @enderror"
                            value='{{ old('tanggal_lahir') }}' name='tanggal_lahir'>

                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Kelas</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='kelas_id' required>
                            @foreach($kelass as $kelas)
                            <option value="{{ $kelas->id }}" @if(old("kelas_id") == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                            @endforeach
                        </select>

                        @error("kelas_id")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Telp.</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="08xxxxxxxxxx"
                            class="form-control form-control-line @error('no_telp') is-invalid @enderror"
                            value='{{ old('no_telp') }}' name='no_telp'>

                        @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama Ayah</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="xxxxxxx"
                            class="form-control form-control-line @error('nama_ayah') is-invalid @enderror"
                            value='{{ old('nama_ayah') }}' name='nama_ayah'>

                        @error('nama_ayah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Pekerjaan Ayah</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="xxxxxxx"
                            class="form-control form-control-line @error('pekerjaan_ayah') is-invalid @enderror"
                            value='{{ old('pekerjaan_ayah') }}' name='pekerjaan_ayah'>

                        @error('pekerjaan_ayah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama Ibu</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="xxxxxxx"
                            class="form-control form-control-line @error('nama_ibu') is-invalid @enderror"
                            value='{{ old('nama_ibu') }}' name='nama_ibu'>

                        @error('nama_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Pekerjaan Ibu</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="xxxxxxx"
                            class="form-control form-control-line @error('pekerjaan_ibu') is-invalid @enderror"
                            value='{{ old('pekerjaan_ibu') }}' name='pekerjaan_ibu'>

                        @error('pekerjaan_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                @foreach($aspeks as $aspek)
                <fieldset class="border">
                    <legend class="w-auto" style="color: black;">
                        Aspek {{ $aspek->nama }}
                    </legend>

                    @foreach($aspek->kriterias as $kriteria_index => $kriteria)
                    <div class="form-group">
                        <label class="col-md-12">Kriteria {{ $kriteria->nama }}</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='kriteria_detail_ids[]' required>
                                @foreach($kriteria->kriteria_details as $kriteria_detail_index => $kriteria_detail)
                                <option value="{{ $kriteria_detail->id }}" @if(old("kriteria_detail_ids.$kriteria_detail_index") == $kriteria_detail->id) selected @endif>{{ $kriteria_detail->keterangan }}</option>
                                @endforeach
                            </select>

                            @error("kriteria_detail_ids.$kriteria_index")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </fieldset>
                @endforeach

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
