@extends("layouts.admin-lte.app")

@section('page') Tambah Akun @endsection

@section("content")

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-block">
                <form class="form-horizontal form-material" action="{{ url(route('user.import')) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="col-md-12">Import Dari File Excel</label>
                        <div class="col-md-12">
                            <input type="file"
                                class="form-control form-control-line @error('file_excel') is-invalid @enderror"
                                name='file_excel'>

                            @if($errors->any())
                            <span class="invalid-feedback" role="alert">
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            </span>
                            @endif
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
@endsection
