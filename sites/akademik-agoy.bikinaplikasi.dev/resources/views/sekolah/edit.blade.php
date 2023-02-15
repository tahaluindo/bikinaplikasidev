@extends("layouts.admin-lte.app")

@section('page') Edit Sekolah @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material"
                        action="{{ url(route('sekolah.update', ['sekolah' => $sekolah->id])) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Nama Sekolah"
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
                                <input type="text" placeholder="No Telp"
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
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
