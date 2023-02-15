@extends("layouts.admin-lte.app")

@section('page') Tambah Kriteria Detail Untuk {{ $kriteria->nama }} @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('kriteria_detail.update', ['kriteria' => $kriteria->id, 'kriteria_detail' => $kriteria_detail->id])) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label class="col-md-12">Keterangan</label>
                    <div class="col-md-12">
                        <textarea name="keterangan" class="form-control form-control-line @error('keterangan') is-invalid @enderror" id="" cols="30" rows="10" placeholder='Keterangan'>{{ old('keterangan') == "" ? $kriteria_detail->keterangan : old('keterangan') }}</textarea>

                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nilai</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1"
                            class="form-control form-control-line @error('nilai') is-invalid @enderror"
                            value='{{ old('nilai') == "" ? $kriteria_detail->nilai : old('nilai') }}' name='nilai' min=1 max=5>

                        @error('nilai')
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
