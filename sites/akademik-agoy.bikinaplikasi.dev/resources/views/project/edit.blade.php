@extends("layouts.admin-lte.app")

@section('page') Edit Data Penerima Beasiswa @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('project.update', $project->id)) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @error('soal_ids')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <label class="col-md-12">Aspek</label>
                    <div class="col-md-12">
                        @foreach($aspeks as $index => $aspek)
                        <div class="pretty p-switch p-fill">
                            <input class="aspek_ids form-check-input" type="checkbox"
                                id="inlineCheckbox-{{ $aspek->id }}" value="{{ $aspek->id }}" @if($aspek->id ==
                            old("aspek_ids.$index") || in_array($aspek->id, $project->getAspekIds()))) checked @endif
                            name="aspek_ids[]" onclick='return confirm("Ubah aspek? Merubah data aspek akan mengubah perhitungan!")'>
                            <div class="state p-success">
                                <label>{{ $aspek->nama }}</label>
                            </div>
                        </div>
                        @endforeach

                        @error('aspek_ids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nama</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Data Penerima Beasiswa x"
                            class="form-control form-control-line @error('nama') is-invalid @enderror"
                            value='{{ old('nama') == "" ? $project->nama : old('nama') }}' name='nama'>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tanggal Mulai Daftar</label>
                    <div class="col-md-12">
                        <input type="date" placeholder="Tanggal Mulai Daftar"
                            class="form-control form-control-line @error('tanggal_mulai_daftar') is-invalid @enderror"
                            value='{{ old('tanggal_mulai_daftar') == "" ? $project->tanggal_mulai_daftar : old('tanggal_mulai_daftar') }}' name='tanggal_mulai_daftar'>

                        @error('tanggal_mulai_daftar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tanggal Akhir Daftar</label>
                    <div class="col-md-12">
                        <input type="date" placeholder="Tanggal Akhir Daftar"
                            class="form-control form-control-line @error('tanggal_akhir_daftar') is-invalid @enderror"
                            value='{{ old('tanggal_akhir_daftar') == "" ? $project->tanggal_akhir_daftar : old('tanggal_akhir_daftar') }}' name='tanggal_akhir_daftar'>

                        @error('tanggal_akhir_daftar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Tanggal Akhir Perubahan Profile</label>
                    <div class="col-md-12">
                        <input type="date" placeholder="Tanggal Akhir Perubahan Profile"
                            class="form-control form-control-line @error('tanggal_akhir_perubahan_profile') is-invalid @enderror"
                            value='{{ old('tanggal_akhir_perubahan_profile') == "" ? $project->tanggal_akhir_perubahan_profile : old('tanggal_akhir_perubahan_profile') }}' name='tanggal_akhir_perubahan_profile'>

                        @error('tanggal_akhir_perubahan_profile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Keterangan</label>
                    <div class="col-md-12">
                        <textarea name="keterangan"
                            class="form-control form-control-line @error('keterangan') is-invalid @enderror" id=""
                            cols="30" rows="10"
                            placeholder='Keterangan'>{{ old('keterangan') == "" ? $project->keterangan : old('keterangan') }}</textarea>

                        @error('keterangan')
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
@endsection
