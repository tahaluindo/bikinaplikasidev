@extends("layouts.admin-lte.app")

@section('page') Tambah Kelas @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('type.store')) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-md-12">Type</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Type"
                            class="form-control form-control-line @error('type') is-invalid @enderror"
                            value='{{ old('type') }}' name='type'>

                        @error('type')
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
