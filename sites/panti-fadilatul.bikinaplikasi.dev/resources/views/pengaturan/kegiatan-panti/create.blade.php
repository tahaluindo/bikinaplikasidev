@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Tambah Kegiatan Panti </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form class="form-horizontal form-material" action="{{ url('/pengaturan/kegiatan-panti') }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
                                        <label for="judul" class="control-label">{{ 'Judul' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="judul"
                                                   class="form-control form-control-line @error('judul') is-invalid @enderror"
                                                   name="judul" type="text" id="judul"
                                                   value="{{ isset($pengurus->judul) ? $pengurus->judul : old('judul') }}">

                                            @error('judul')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
                                        <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="deskripsi"
                                                   class="form-control form-control-line @error('deskripsi') is-invalid @enderror"
                                                   name="deskripsi" type="text" id="deskripsi"
                                                   value="{{ isset($pengurus->deskripsi) ? $pengurus->deskripsi : old('deskripsi') }}">

                                            @error('deskripsi')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'Foto' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="gambar"
                                                   class="form-control form-control-line @error('gambar') is-invalid @enderror"
                                                   name="gambar" type="file" id="gambar"
                                                   value="{{ isset($pengurus->gambar) ? $pengurus->gambar : old('gambar') }}">

                                            @error('gambar')
                                            <span class="invalid-feedback text-danger" role="alert">
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
                </div>
            </div>
        </div>
    </div>

@endsection