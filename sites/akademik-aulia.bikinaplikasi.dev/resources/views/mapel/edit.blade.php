@extends("layouts.admin-lte.app")

@section('page') Edit Mapel @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
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
                        <input type="hidden" name="mapel_detail_ids[]" value="{{ $mapel_detail->id }}" >
                        <div class="col-md-6 pb-2" style='margin-top: 10px;'>

                            <select class="form-control  w-100" name='kelas_id[]' required  style='width: 100% !important;'>
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

                        <div class="col-md-6 pb-2"style='margin-top: 10px;'>
                            <select class="form-control w-100" name='user_id[]' required style='width: 100% !important;'>
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

            <div class="form-group form-inline d-none" id='mapelFormKelasGuruAdd' style='display: none;'>
                <input type="hidden" name="mapel_detail_ids[]" value="0">

                <div class="col-md-6 pb-2" style='margin-top: 10px;'>
                    <select class="form-control w-100" name='kelas_id[]' style='width: 100% !important;'>
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

                <div class="col-md-6 pb-2" style='margin-top: 10px;'>
                    <select class="form-control w-100" name='user_id[]' style='width: 100% !important;'>
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
@endsection
