@extends("layouts.admin-lte.app")

@section('page') Tambah Lokasi @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('lokasi.store')) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-md-12">Lokasi</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Lokasi"
                            class="form-control form-control-line @error('lokasi') is-invalid @enderror"
                            value='{{ old('lokasi') }}' name='lokasi'>

                        @error('lokasi')
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
