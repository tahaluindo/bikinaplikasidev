@extends("layouts.admin-lte.app")

@section('page') Tambah Informasi @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material"
                action="{{ url(route('informasi.store')) }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-md-12">Judul</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Informasi 1"
                            class="form-control form-control-line @error('judul') is-invalid @enderror"
                            value='{{ old('judul') }}' name='judul'>

                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Deskripsi</label>
                    <div class="col-md-12">
                        <textarea id='editor-1' style="height: 130px !important;" class="form-control form-control-line @error('deskripsi') is-invalid @enderror" name='deskripsi'>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Foto (Bisa banyak sekaligus)</label>
                    <div class="col-md-12">
                        <input type="file"
                            class="form-control form-control-line @error('file') is-invalid @enderror"
                            name='foto[]' multiple>

                        @error('foto.*')
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
