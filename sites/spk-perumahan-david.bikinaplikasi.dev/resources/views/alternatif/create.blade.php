@extends("layouts.admin-lte.app")

@section('page') Tambah Alternatif @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ route('alternatif.registerStore', ['project' => $project->id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                {{-- ini input khusus untuk halaman register biar bisa bedain dari mana --}}
                <input type="hidden" name="from" value='register'>

                <div class="form-group" style="padding-top: 20px;">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Alternatif x"
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
                    <label class="col-md-12">No Identitas</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="1"
                            class="form-control form-control-line @error('no_identitas') is-invalid @enderror"
                            value='{{ old('no_identitas') }}' name='no_identitas' minlength=1 maxlength=999999999999999>

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
                        <input type="text" placeholder="1"
                            class="form-control form-control-line @error('alamat') is-invalid @enderror"
                            value='{{ old('alamat') }}' name='alamat' minlength=1 maxlength=999999999999999>

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
                            value='{{ old('no_telp') }}' name='no_telp'>

                        @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                @foreach($aspeks as $aspek)
                <fieldset class="border">
                    <legend class="w-auto" style="color: black;">
                        Aspek {{ $aspek->nama }}
                    </legend>

                    @foreach($aspek->kriterias as $kriteria_index => $kriteria)
                    <div class="form-group">
                        <label class="col-md-12">Kriteria {{ $kriteria->nama }}</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='kriteria_detail_ids[]' required>
                                @foreach($kriteria->kriteria_details as $kriteria_detail_index => $kriteria_detail)
                                <option value="{{ $kriteria_detail->id }}" @if(old("kriteria_detail_ids.$kriteria_detail_index") == $kriteria_detail->id) selected @endif>{{ $kriteria_detail->keterangan }}</option>
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
