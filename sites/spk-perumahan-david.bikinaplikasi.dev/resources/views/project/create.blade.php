@extends("layouts.admin-lte.app")

@section('page') Tambah Data Pemilih Rumah @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('project.store')) }}" method="post"
                enctype="multipart/form-data">
                @csrf

                @error('soal_ids')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <label class="col-md-12">Aspek</label>
                    <div class="col-md-12">
                        @foreach($aspeks as $index => $aspek)
                        <div class="pretty p-switch p-fill">
                            <input class="aspek_ids form-check-input" type="checkbox"
                                id="inlineCheckbox-{{ $aspek->id }}" value="{{ $aspek->id }}"
                                @if($aspek->id == old("aspek_ids.$index")) checked @endif
                            name="aspek_ids[]">
                            <div class="state p-success">
                                <label>{{ $aspek->nama }}</label>
                            </div>
                        </div>
                        @endforeach

                        @error('aspek_ids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Data Pemilih Rumah x"
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
                    <label class="col-md-12">Lokasi Rumah</label>
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
                    <label class="col-md-12">Keterangan</label>
                    <div class="col-md-12">
                        <textarea name="keterangan"
                            class="form-control form-control-line @error('keterangan') is-invalid @enderror" id=""
                            cols="30" rows="10" placeholder='Keterangan'>{{ old('keterangan') }}</textarea>

                        @error('keterangan')
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
