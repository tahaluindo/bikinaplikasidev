@extends("layouts.monster-admin-lite.app")

@section("content")
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Absensi</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Absensi</li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal form-material" action="{{ url(route('absensi.store')) }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="form-group">
                                <label class="col-md-12">Mapel Detail Id</label>
                                <div class="col-md-12">
                                    <select class="mapel_detail_id form-control w-100" name='mapel_detail_id'>
                                        @foreach($mapel_details as $mapel_detail )
                                            <option @if(old('mapel_detail_id')==$mapel_detail->mapel->id) selected @endif
                                            value={{ $mapel_detail->id }}>
                                                {{ $mapel_detail->mapel->nama }} | {{ $mapel_detail->kelas->nama }}</option>
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
                                <label class="col-md-12">Tanggal</label>
                                <div class="col-md-12">
                                    <input type="date" placeholder="Absensi 1"
                                           class="form-control form-control-line @error('tanggal') is-invalid @enderror"
                                           value='{{ old('tanggal') == "" ? date("Y-m-d") : old('tanggal') }}' name='tanggal'>

                                    @error('tanggal')
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
