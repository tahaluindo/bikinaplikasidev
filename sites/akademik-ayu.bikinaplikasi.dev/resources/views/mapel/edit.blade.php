@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Mapel</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Mapel</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('mapel.update', ['mapel' => $mapel->id])) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Mapel 1"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') == "" ? $mapel->nama : old('nama')}}' name='nama'>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Kelompok</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='kelompok'>
                                    @foreach(['A', 'B', 'C'] as $kelompok)
                                    <option value="{{ $kelompok }}" @if(old('kelompok')==$kelompok || $mapel->kelompok == $kelompok) selected
                                        @endif>{{ $kelompok }}</option>
                                    @endforeach
                                </select>

                                @error('kelompok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <fieldset class="border p-2">
                            <legend class="w-auto">
                                Kelas & Guru
                                <button class="btn btn-sm btn-success" id='mapelBtnAdd' type="button">+Tambah</button>
                            </legend>

                            <div class="form-group form-inline" id='mapelFormKelasGuru'>
                                <label class="col-md-6 p-0">
                                    <span class="mr-auto">Kelas</span>
                                </label>
                                <label class="col-md-6 p-0">
                                    <span class="mr-auto">Guru</span>
                                </label>

                                @foreach ($mapel->mapel_details as $mapel_detail)
                                <input type="hidden" name="mapel_detail_ids[]" value="{{ $mapel_detail->id }}">
                                <div class="col-md-6 pb-2">

                                    <select class="form-control  w-100" name='kelas_id[]' required>
                                        <option value="batalkan">Batalkan</option>
                                        @foreach($kelass as $kelas)
                                        <option
                                            value='{{ $kelas->id }}' @if($kelas->id == $mapel_detail->kelas_id || old('kelas_id')==$kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 pb-2">
                                    <select class="form-control w-100" name='user_id[]' required>
                                        @foreach($users as $user)
                                        <option
                                            value='{{ $user->id }}' @if($user->id == $mapel_detail->user_id || old('user_id')==$mapel_detail->user_id) selected @endif>{{ $user->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endforeach
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group form-inline d-none" id='mapelFormKelasGuruAdd'>
                        <input type="hidden" name="mapel_detail_ids[]" value="0">

                        <div class="col-md-6 pb-2">
                            <select class="form-control w-100" name='kelas_id[]'>
                                @foreach($kelass as $kelas)
                                <option value='{{ $kelas->id }}'>{{ $kelas->nama }}</option>
                                @endforeach
                            </select>

                            @error('kelas_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6 pb-2">
                            <select class="form-control w-100" name='user_id[]'>
                                @foreach($users as $user)
                                <option value='{{ $user->id }}'>{{ $user->nama }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
