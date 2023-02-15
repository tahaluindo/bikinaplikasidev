@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Perekapan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Perekapan</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('perekapan.show')) }}"
                        method="get" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Mata Pelajaran</label>
                            <div class="col-md-12">
                                <select class="form-control w-100" name='mapel_id' required>
                                    <option value="">--Pilih Mata pelajaran--</option>
                                    @foreach($mapel_details as $id => $mapel_detail)
                                    <option @if(old('mapel_id') == $id) selected @endif
                                        value='{{ $mapel_detail->mapel->id }}'>{{ $mapel_detail->mapel->nama }}</option>
                                    @endforeach
                                </select>

                                @error('mapel_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Kelas</label>
                            <div class="col-md-12">
                                <select class="form-control  w-100" name='kelas_id' required>
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach($kelass as $id => $kelas)
                                    <option @if(old('kelas_id') == $id) selected @endif
                                        value='{{ $kelas->id }}'>{{ $kelas->nama }}</option>
                                    @endforeach
                                </select>

                                @error('kelas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            {{--  <div class="col-sm-12 btn-group">
                                <button class="btn btn-primary mr-2" type="submit">Print HTML</button>

                                <button class="btn btn-success" type="submit">Print Excel</button>
                            </div>  --}}
                            <div class="col-sm-12 btn-group">
                                <button class="btn btn-primary mr-2" type="submit">Lihat Perekapan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
