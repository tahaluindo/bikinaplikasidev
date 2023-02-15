@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Jadwal</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tambah Jadwal</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('jadwal.store')) }}" method="post"
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
                            <label class="col-md-12">Hari</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='hari'>
                                    @foreach($haris as $hari)
                                    <option value="{{ $hari }}" @if(old('hari')==$hari) selected
                                        @endif>{{ $hari }} </option>
                                    @endforeach
                                </select>

                                @error('hari')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Dari Jam</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="12" class="form-control form-control-line"
                                    name='dari_jam' value='{{ old('dari_jam') }}'>

                                @error('dari_jam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Sampai Jam</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="12" class="form-control form-control-line"
                                    name='sampai_jam' value='{{ old('sampai_jam') }}'>

                                @error('sampai_jam')
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
                                    @foreach($statuss as $status)
                                    <option value="{{ $status }}" @if(old('status')==$status) selected
                                        @endif>{{ $status }} </option>
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