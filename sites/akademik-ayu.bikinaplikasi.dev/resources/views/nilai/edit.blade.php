@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Nilai</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material"
                        action="{{ url(route('nilai.update', $nilai->id)) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label class="col-md-12">Mapel dan Guru</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='mapel_detail_id'>
                                    @foreach($mapel_details as $mapel_detail)
                                    <option value="{{ $mapel_detail->id }}" @if(old('mapel_detail_id')==$mapel_detail->id || $nilai->mapel_detail->id == $mapel_detail->id) selected
                                        @endif>{{ $mapel_detail->mapel->nama }} (Guru: {{ $mapel_detail->user->nama }})
                                    </option>
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
                                    name='tahun' value='{{ old('tahun') == "" ? $nilai->tahun : "" }}' max='{{ date("Y") }}'>

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
                                    <option value="{{ $semester }}" @if(old('semester')==$semester || $nilai->semester == $semester) selected
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
    </div>
</div>
@endsection
