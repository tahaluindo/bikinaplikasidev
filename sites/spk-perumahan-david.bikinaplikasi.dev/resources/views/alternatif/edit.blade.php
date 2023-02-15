@extends("layouts.admin-lte.app")

@section('page') Tambah Alternatif @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material"
                action="{{ url(route('alternatif.update', ['project' => $project->id, 'alternatif' => $alternatif->id])) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Alternatif x"
                            class="form-control form-control-line @error('nama') is-invalid @enderror"
                            value='{{ old('nama') == "" ? $alternatif->nama : old('nama') }}' name='nama'>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Identitas</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="1"
                            class="form-control form-control-line @error('no_identitas') is-invalid @enderror"
                            value='{{ old('no_identitas') == "" ? $alternatif->no_identitas : old('no_identitas') }}'
                            name='no_identitas' minlength=1 maxlength=999999999999999>

                        @error('no_identitas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Alamat</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Alamat"
                            class="form-control form-control-line @error('alamat') is-invalid @enderror"
                            value='{{ old('alamat') == "" ? $alternatif->alamat : old('alamat') }}' name='alamat' minlength=1 maxlength=999999999999999>

                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">No Telp.</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="08xxxxxxxxxx"
                            class="form-control form-control-line @error('no_telp') is-invalid @enderror"
                            value='{{ old('no_telp') == "" ? $alternatif->no_telp : old('no_telp') }}' name='no_telp'>

                        @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                @foreach($aspeks as $aspek)
                <fieldset class="border">
                    <legend class="w-auto">
                        Aspek {{ $aspek->nama }}
                    </legend>

                    @foreach($aspek->kriterias as $kriteria_index => $kriteria)
                    <div class="form-group">
                        <label class="col-md-12">Kriteria {{ $kriteria->nama }}</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='kriteria_detail_ids[]' required>
                                @foreach($kriteria->kriteria_details as $kriteria_detail_index => $kriteria_detail)
                                <option value="{{ $kriteria_detail->id }}"
                                    @if(old("kriteria_detail_ids.$kriteria_detail_index")==$kriteria_detail->id || in_array($kriteria_detail->id, $alternatif->getKriteriaDetailIds())) selected @endif>Nilai:
                                    {{ $kriteria_detail->nilai }} | {{ $kriteria_detail->keterangan }}</option>
                                @endforeach
                            </select>

                            @error("kriteria_detail_ids.$kriteria_index")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </fieldset>
                @endforeach

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
