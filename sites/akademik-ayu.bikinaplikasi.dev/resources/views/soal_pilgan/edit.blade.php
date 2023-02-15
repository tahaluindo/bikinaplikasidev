@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Soal Pilihan Ganda</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Soal Pilgan</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">

                    <form class="form-horizontal form-material" action="{{ url(route('soal_pilgan.update', ['soal_pilgan' => $soal_pilgan->id])) }}"
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
                                    <option @if(old('mapel_id')==$mapel->id || $soal_pilgan->mapel_id == $mapel->id) selected @endif value='{{ $mapel->id }}'>
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
                                    <option @if(old('jenis')=='Latihan' || $soal_pilgan->jenis == "Latihan" ) selected @endif value='Latihan'>Latihan
                                    </option>
                                    <option @if(old('jenis')=='Ujian' || $soal_pilgan->jenis == "Ujian" ) selected @endif value='Ujian'>Ujian</option>
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
                                Soal & Jawaban
                            </legend>

                            <div class="form-group form-inline" id='listSoalEssay'>
                                <div class="col-md-12 mb-2">
                                    <textarea id='editor-0' class="form-control form-control-line @error('soal') is-invalid @enderror pb-5"
                                        name='soal' placeholder="soal" required>{{ old('soal') == "" ? $soal_pilgan->soal : old('soal') }}</textarea>

                                    @error('soal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="label label-info mb-2 label-sm col-md-2">Opsi A</label>
                                    <textarea id='editor-1' class="form-control form-control-line @error('opsi_a') is-invalid @enderror pb-5"
                                        name='opsi_a' required>{{ old('opsi_a') == "" ? $soal_pilgan->opsi_a : old('opsi_a') }}</textarea>

                                    @error('opsi_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="label label-info mb-2 label-sm col-md-2">Opsi B</label>
                                    <textarea id='editor-2' class="form-control form-control-line @error('opsi_b') is-invalid @enderror pb-5"
                                        name='opsi_b' required>{{ old('opsi_b') == "" ? $soal_pilgan->opsi_b : old('opsi_b') }}</textarea>

                                    @error('opsi_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="label label-info mb-2 label-sm col-md-2">Opsi C</label>
                                    <textarea id='editor-3' class="form-control form-control-line @error('opsi_c') is-invalid @enderror pb-5"
                                              name='opsi_c' required>{{ old('opsi_c') == "" ? $soal_pilgan->opsi_c : old('opsi_c') }}</textarea>

                                    @error('opsi_c')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="label label-info mb-2 label-sm col-md-2">Opsi D</label>
                                    <textarea id='editor-4' class="form-control form-control-line @error('opsi_d') is-invalid @enderror pb-5"
                                        name='opsi_d' required>{{ old('opsi_d') == "" ? $soal_pilgan->opsi_d : old('opsi_d') }}</textarea>

                                    @error('opsi_d')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="label label-success mb-2 label-sm col-md-2">Jawaban</label>
                                    <select class="form-control w-100" name='jawaban'>
                                        <option value="A" @if(old('jawaban') == "A" || $soal_pilgan->jawaban == "A") selected @endif>A</option>
                                        <option value="B" @if(old('jawaban') == "B" || $soal_pilgan->jawaban == "B") selected @endif>B</option>
                                        <option value="C" @if(old('jawaban') == "C" || $soal_pilgan->jawaban == "C") selected @endif>C</option>
                                        <option value="D" @if(old('jawaban') == "D" || $soal_pilgan->jawaban == "D") selected @endif>D</option>
                                    </select>

                                    @error('jawaban')
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
