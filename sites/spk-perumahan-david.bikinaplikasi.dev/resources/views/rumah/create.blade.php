@extends("layouts.admin-lte.app")

@section('page') Tambah Rumah @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('rumah.store')) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-md-12">Type</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='type_id'>
                            @foreach($types as $type)
                            <option value="{{ $type->id }}" @if(old('type_id') == $type->id) selected @endif>{{ $type->type }}</option>
                            @endforeach
                        </select>

                        @error('type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Lokasi</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='lokasi_id'>
                            @foreach($lokasis as $lokasi)
                            <option value="{{ $lokasi->id }}" @if(old('lokasi_id') == $lokasi->id) selected @endif>{{ $lokasi->lokasi }}</option>
                            @endforeach
                        </select>

                        @error('lokasi_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Alamat</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Alamat"
                            class="form-control form-control-line @error('alamat') is-invalid @enderror"
                            value='{{ old('alamat') }}' name='alamat'>

                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Keterangan</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Keterangan"
                            class="form-control form-control-line @error('keterangan') is-invalid @enderror"
                            value='{{ old('keterangan') }}' name='keterangan'>

                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Status</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='status'>
                            @foreach(['Terisi','Kosong','Rusak'] as $status)
                            <option value="{{ $status }}" @if(old('status_id') == $status) selected @endif>{{ $status }}</option>
                            @endforeach
                        </select>

                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Harga</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Harga"
                            class="form-control form-control-line @error('harga') is-invalid @enderror"
                            value='{{ old('harga') }}' name='harga'>

                        @error('harga')
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
