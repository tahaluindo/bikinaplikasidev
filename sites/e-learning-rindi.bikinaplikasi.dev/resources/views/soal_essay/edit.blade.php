@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Soal Essay</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">

                    <form class="form-horizontal form-material" action="{{ url(route("soal_essay.update", ['soal_essay' => $soal_essay->id])) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label class="col-md-12">
                                Mapel
                            </label>
                            <div class="col-md-12">
                                <select class="form-control  w-100" name='mapel_id'>
                                    @foreach($mapels as $id => $mapel)
                                    <option @if(old('mapel_id')==$mapel->id || $soal_essay->mapel_id == $mapel->id) selected @endif value='{{ $mapel->id }}'>
                                        {{ $mapel->nama }}</option>
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
                            <label class="col-md-12">
                                Jenis
                            </label>
                            <div class="col-md-12">
                                <select class="form-control w-100" name='jenis'>
                                    <option @if(old('jenis')=='Latihan' || $soal_essay->jenis == "Latihan" ) selected @endif value='Latihan'>Latihan
                                    </option>
                                    <option @if(old('jenis')=='Ujian'  || $soal_essay->jenis == "Ujian") selected @endif value='Ujian'>Ujian</option>
                                </select>

                                @error('jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <fieldset class="border p-2">
                            <div class="form-group form-inline" id='listSoalEssay'>
                                <div class="col-md-11 mb-3" data-hapus='hapusEditor_0'>
                                    <input type="number"
                                        class="form-control w-100 form-control-line @error('bobot') is-invalid @enderror"
                                        value='{{ old('soal') == "" ? $soal_essay->bobot : old('bobot') }}' name='bobot' min=0 placeholder="Bobot soal" required>

                                    @error('bobot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12" data-hapus='hapusEditor_0'>
                                    <textarea id='editor-0'
                                        class="form-control form-control-line @error('soal') is-invalid @enderror pb-5"
                                        name='soal' placeholder="soal" required>{{ old('soal') == "" ? $soal_essay->soal : old('soal')}}</textarea>

                                    @error('soal')
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
