@extends("layouts.admin-lte.app")

@section('page') Tambah Mapel @endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form class="form-horizontal form-material" action="{{ url(route('mapel.store')) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="col-md-12">Nama</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Mapel 1"
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
                        <label class="col-md-12">Kelompok</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='kelompok'>
                                @foreach(['A', 'B', 'C'] as $kelompok)
                                    <option value="{{ $kelompok }}"
                                            @if(old('kelompok')==$kelompok || $kelompok == $kelompok) selected
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
                            <span class="btn btn-sm btn-success" id='mapelBtnAdd'>+Tambah</span>
                        </legend>

                        <div class="form-group form-inline" id='mapelFormKelasGuru'>
                            <div class="col-md-6 p-0">
                                <label>
                                    <span class="mr-auto">Kelas</span>
                                </label>
                                <select class="form-control  w-100" name='kelas_id[]' required
                                        style='width: 100% !important;'>
                                    @foreach($kelass as $kelas)
                                        <option @if(old('kelas_id')==$kelas->id) selected @endif
                                        value='{{ $kelas->id }}'>{{ $kelas->nama }}</option>
                                    @endforeach
                                </select>

                                @error('kelas_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 pb-2">
                                <label>
                                    <span class="mr-auto">Guru</span>
                                </label>

                                <select class="form-control w-100" name='user_id[]' required
                                        style='width: 100% !important;'>
                                    @foreach($gurus as $guru)
                                        <option @if(old('user_id')==$guru->id) selected @endif
                                        value='{{ $guru->id }}'>{{ $guru->nama }}</option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>



                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>

                <div class="form-group form-inline" id='mapelFormKelasGuruAdd' style='display: none;'>
                    <div class="col-md-6 pb-2" style='margin-top: 10px;'>
                        <select class="form-control  w-100" name='kelas_id[]' style='width: 100% !important;'>
                            @foreach($kelass as $kelas)
                                <option @if(old('kelas_id')==$kelas->id) selected @endif
                                value='{{ $kelas->id }}'>{{ $kelas->nama }}</option>
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
                            @foreach($gurus as $guru)
                                <option @if(old('user_id')==$guru->id) selected @endif
                                value='{{ $guru->id }}'>{{ $guru->nama }}</option>
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
