@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sekolah</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center text-right">
            {{-- <span class='label label-info'> Terakhir Diperbarui: {{ toIdTime($sekolah->updated_at) }}</span> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">

                    <form class="form-horizontal form-material"
                        action="{{ url(route('sekolah.update', ['sekolah' => $sekolah->id])) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') == "" ? $sekolah->nama : old('nama') }}' name='nama'>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">No Telp</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control form-control-line @error('no_telp') is-invalid @enderror"
                                    value='{{ old('no_telp') == "" ? $sekolah->no_telp : old('no_telp') }}' name='no_telp'>

                                @error('no_telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line @error('alamat') is-invalid @enderror" name='alamat'>{{ old('alamat') == "" ? $sekolah->alamat : old('alamat') }}</textarea>

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <textarea id='editor-1' style="height: 130px !important;" class="form-control form-control-line @error('deskripsi') is-invalid @enderror" name='deskripsi'>{{ old('deskripsi') == "" ? $sekolah->deskripsi : old('deskripsi') }}</textarea>

                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Visi</label>
                            <div class="col-md-12">
                                <textarea id='editor-2' class="form-control form-control-line @error('visi') is-invalid @enderror" name='visi'>{{ old('visi') == "" ? $sekolah->visi : old('visi') }}</textarea>

                                @error('visi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Misi</label>
                            <div class="col-md-12">
                                <textarea id='editor-3' class="form-control form-control-line @error('misi') is-invalid @enderror" name='misi'>{{ old('misi') == "" ? $sekolah->misi : old('misi') }}</textarea>

                                @error('misi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Struktur Organisasi</label>
                            <div class="col-md-12">
                                <input type="file"
                                    class="form-control form-control-line @error('struktur_organisasi') is-invalid @enderror" name='struktur_organisasi'>

                                @error('struktur_organisasi')
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
</div>
@endsection
