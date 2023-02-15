@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Naik Kelas</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ route('user.naik_kelas_store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="full_url" value='{{ request()->fullUrl() }}'>
                        <input type="hidden" name="ids" value='{{ request()->ids }}'>

                        <div class="form-group">
                            <label class="col-md-12">Kelas</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='kelas_id'
                                    @if(in_array(old('level'), ['guru'])) disabled @endif>
                                    @foreach($kelass as $kelas)
                                    <option value="{{ $kelas->id }}" @if(old('kelas_id')==$kelas->id) selected
                                        @endif>{{ $kelas->nama }}</option>
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