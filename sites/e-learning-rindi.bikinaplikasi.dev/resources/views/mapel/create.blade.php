@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Mapel</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Mapel</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
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

                        <fieldset class="border p-2">
                            <legend class="w-auto">
                                Kelas & Guru
                                <span class="btn btn-sm btn-success" id='mapelBtnAdd'>+Tambah</span>
                            </legend>

                            <div class="form-group form-inline" id='mapelFormKelasGuru'>
                                <div class="col-md-6 pb-2">
                                    <label class="col-md-12 p-0">
                                        <span class="mr-auto">Kelas</span>
                                    </label>
                                    <select class="form-control  w-100" name='kelas_id[]' required>
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
                                    <label class="col-md-12 p-0">
                                        <span class="mr-auto">Guru</span>
                                    </label>

                                    <select class="form-control w-100" name='user_id[]' required>
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

                    <div class="form-group form-inline d-none" id='mapelFormKelasGuruAdd'>
                        <div class="col-md-6 pb-2">
                            <select class="form-control  w-100" name='kelas_id[]'>
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
                            <select class="form-control w-100" name='user_id[]'>
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
    </div>
</div>
@endsection
