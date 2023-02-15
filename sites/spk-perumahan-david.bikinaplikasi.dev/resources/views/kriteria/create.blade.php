@extends("layouts.admin-lte.app")

@section('page') Tambah Kriteria @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('kriteria.store')) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-md-12">Aspek</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='aspek_id'>
                            @foreach($aspeks as $aspek)
                            <option value="{{ $aspek->id }}" @if(old('aspek_id') == $aspek->id) selected @endif>{{ $aspek->nama }}</option>
                            @endforeach
                        </select>

                        @error('aspek_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Kriteria x"
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
                    <label class="col-md-12">Target</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1"
                            class="form-control form-control-line @error('target') is-invalid @enderror"
                            value='{{ old('target') }}' name='target' min=1 max=5>

                        @error('target')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Jenis</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='jenis'>
                            <option value="Core Factor" @if(old('jenis') == "Core Factor") selected @endif>Core Factor</option>
                            <option value="Secondary Factor" @if(old('jenis') == "Secondary Factor") selected @endif>Secondary Factor</option>
                        </select>

                        @error('jenis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Gap</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1"
                            class="form-control form-control-line @error('gap') is-invalid @enderror"
                            value='{{ old('gap') }}' name='gap' min=1 max=5>

                        @error('gap')
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
