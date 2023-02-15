@extends("layouts.admin-lte.app")

@section('page') Tambah Nilai @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material"
                        action="{{ url(route('nilai.store')) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Mapel dan Guru</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='mapel_detail_id'>
                                    @foreach($mapel_details as $mapel_detail)
                                    <option value="{{ $mapel_detail->id }}" @if(old('mapel_detail_id')==$mapel_detail->id) selected
                                        @endif>{{ $mapel_detail->mapel->nama }} (Guru: {{ $mapel_detail->user->nama }})</option>
                                    @endforeach
                                </select>

                                @error('mapel_detail_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tahun</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="2020" class="form-control form-control-line"
                                    name='tahun' value='{{ old('tahun') == "" ? date('Y') : old('tahun') }}'>

                                @error('tahun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Semester</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='semester'>
                                    @foreach([1, 2] as $semester)
                                    <option value="{{ $semester }}" @if(old('semester')==$semester) selected
                                        @endif>{{ $semester }}</option>
                                    @endforeach
                                </select>

                                @error('semester')
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
