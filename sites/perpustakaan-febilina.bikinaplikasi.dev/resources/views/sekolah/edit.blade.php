@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sekolah</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item">Sekolah</li>
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
                            action="{{ route('sekolah.update', ['sekolah' => $sekolah->id]) }}" method="post"
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
{{--
                            <div class="form-group">
                                <label class="col-md-12">Deskripsi</label>
                                <div class="col-md-12">
                                    <textarea id='editor-1' style="height: 130px !important;"
                                        class="form-control form-control-line @error('deskripsi') is-invalid @enderror"
                                        name='deskripsi'>{{ old('deskripsi') == "" ? $sekolah->deskripsi : old('deskripsi') }}</textarea>

                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-12">Logo</label>
                                <div class="col-md-12">
                                    <input type="file"
                                        class="form-control form-control-line @error('logo') is-invalid @enderror"
                                        name='logo'>

                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{--
                            <div class="form-group">
                                <label class="col-md-12">Alamat</label>
                                <div class="col-md-12">
                                    <textarea
                                        class="form-control form-control-line @error('alamat') is-invalid @enderror"
                                        name='alamat'>{{ old('alamat') == "" ? $sekolah->alamat : old('alamat') }}</textarea>

                                    @error('alamat')
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
                                        value='{{ old('no_telp') == "" ? $sekolah->no_telp : old('no_telp') }}'
                                        name='no_telp'>

                                    @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}

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
</div>
@endsection
