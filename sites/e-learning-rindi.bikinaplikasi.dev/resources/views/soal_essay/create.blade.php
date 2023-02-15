@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Soal Essay</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Soal Essay</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">

                    <form class="form-horizontal form-material" action="{{ url(route('soal_essay.store')) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">
                                Mapel
                            </label>
                            <div class="col-md-12">
                                <select class="form-control w-100" name='mapel_id'>
                                    @foreach($mapels as $id => $mapel)
                                    <option @if(old('mapel_id')==$mapel->id) selected @endif value='{{ $mapel->id }}'>
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
                                    <option @if(old('jenis')=='Latihan' ) selected @endif value='Latihan'>Latihan
                                    </option>
                                    <option @if(old('jenis')=='Ujian' ) selected @endif value='Ujian'>Ujian</option>
                                </select>

                                @error('jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <fieldset class="border p-2">
                            <legend class="w-auto">
                                Bobot & Soal
                                <span class="btn btn-sm btn-success" id='listSoalEssayBtnAdd'>+Tambah</span>
                            </legend>

                            <div class="form-group form-inline" id='listSoalEssay'>
                                @if(old('bobot') == "")
                                <label for="" data-hapus='hapusEditor_0' data-target="[data-hapus='hapusEditor_0'"
                                    class="btnHapusEditor lblHapusSoal col-md-1 label label-danger label-sm">Hapus</label>
                                <div class="col-md-11 mb-3" data-hapus='hapusEditor_0'>
                                    <input type="number"
                                        class="form-control w-100 form-control-line @error('bobot') is-invalid @enderror"
                                        value='{{ old('bobot') }}' name='bobot[]' min=0 placeholder="Bobot soal" required>

                                    @error('bobot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12" data-hapus='hapusEditor_0'>
                                    <textarea id='editor-0'
                                        class="form-control form-control-line @error('soal') is-invalid @enderror pb-5"
                                        name='soal[]' placeholder="soal" required>{{ old('soal') }}</textarea>

                                    @error('soal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @else
                                    @foreach(old('bobot') as $index => $bobot)
                                    <label for="" data-hapus='hapusEditor_{{ $index }}' data-target="[data-hapus='hapusEditor_{{ $index }}'"
                                        class="btnHapusEditor lblHapusSoal col-md-1 label label-danger label-sm">Hapus</label>
                                    <div class="col-md-11 mb-3" data-hapus='hapusEditor_{{ $index }}'>
                                        <input type="number"
                                            class="form-control w-100 form-control-line @error("bobot.$index") is-invalid @enderror"
                                            value='{{ old("bobot.$index") }}' name='bobot[]' min=0 placeholder="Bobot soal" required>

                                        @error("bobot.$index")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12" data-hapus='hapusEditor_{{ $index }}'>
                                        <textarea id='editor-{{ $index }}'
                                            class="form-control form-control-line @error("soal.$index") is-invalid @enderror pb-5"
                                            name='soal[]' placeholder="soal" required>{{ old("soal.$index") }}</textarea>

                                        @error("soal.$index")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group form-inline d-none" id='listSoalEssayToAdd'>
                        <label for="" data-target='.hapusEditor-x' id='hapusEditor-x'
                            class="btnHapusEditor label label-danger label-sm col-md-1">Hapus</label>
                        <div class="col-md-11 mb-3" id='hapusEditor-x'>
                            <input type="number"
                                class="form-control w-100 form-control-line" name='bobot[]' min=0 placeholder="Bobot soal" required>
                        </div>

                        <div class="col-md-12" id='hapusEditor-x'>
                            <textarea id='editor-x'
                                class="form-control form-control-line" name='soal[]'
                                placeholder="soal" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
