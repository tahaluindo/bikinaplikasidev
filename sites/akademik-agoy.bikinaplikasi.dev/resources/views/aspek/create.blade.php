@extends("layouts.admin-lte.app")

@section('page') Tambah Aspek @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('aspek.store')) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Aspek x"
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
                    <label class="col-md-12">Persen</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="10"
                            class="form-control form-control-line @error('persen') is-invalid @enderror"
                            value='{{ old('persen') }}' name='persen' min=1 max=100>

                        @error('persen')
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
