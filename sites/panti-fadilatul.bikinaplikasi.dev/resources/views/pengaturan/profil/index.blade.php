@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Profil </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form class="form-horizontal form-material mb-5"
                                      action="{{ url('/pengaturan/profil') }}"
                                      method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="form-group {{ $errors->has('Deskripsi') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'Deskripsi' }}</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="5" name="deskripsi" type="textarea"
                                                      id="deskripsi" placeholder="deskripsi"
                                                      required>{{ isset($pengaturan->deskripsi) ? $pengaturan->deskripsi : old('deskripsi')}}</textarea>

                                            @error('deskripsi')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('Alamat') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'Alamat' }}</label>
                                        <div class="col-md-12">

                                            <textarea class="form-control" rows="5" name="alamat" type="textarea"
                                                      id="alamat" placeholder="alamat"
                                                      required>{{ isset($pengaturan->alamat) ? $pengaturan->alamat : old('alamat')}}</textarea>

                                            @error('alamat')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'Foto' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="gambar"
                                                   class="form-control form-control-line @error('gambar') is-invalid @enderror"
                                                   name="gambar" type="file" id="gambar"
                                                   value="{{ isset($pengaturan->gambar) ? $pengaturan->gambar : old('gambar') }}">

                                            @error('gambar')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'No HP' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="no_hp"
                                                   class="form-control form-control-line @error('no_hp') is-invalid @enderror"
                                                   name="no_hp" type="text" id="no_hp"
                                                   value="{{ isset($pengaturan->no_hp) ? $pengaturan->no_hp : old('no_hp') }}">

                                            @error('no_hp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('akun_facebook') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'Akun Facebook' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="akun_facebook"
                                                   class="form-control form-control-line @error('akun_facebook') is-invalid @enderror"
                                                   name="akun_facebook" type="text" id="akun_facebook"
                                                   value="{{ isset($pengaturan->akun_facebook) ? $pengaturan->akun_facebook : old('akun_facebook') }}">

                                            @error('akun_facebook')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('akun_instagram') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'Akun Instagram' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="akun_instagram"
                                                   class="form-control form-control-line @error('akun_instagram') is-invalid @enderror"
                                                   name="akun_instagram" type="text" id="akun_instagram"
                                                   value="{{ isset($pengaturan->akun_instagram) ? $pengaturan->akun_instagram : old('akun_instagram') }}">

                                            @error('akun_instagram')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>                                    
                                    <div class="form-group {{ $errors->has('no_whatsapp') ? 'has-error' : ''}}">
                                        <label for="foto" class="control-label">{{ 'No Whatsapp' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="no_whatsapp"
                                                   class="form-control form-control-line @error('no_whatsapp') is-invalid @enderror"
                                                   name="no_whatsapp" type="text" id="no_whatsapp"
                                                   value="{{ isset($pengaturan->no_whatsapp) ? $pengaturan->no_whatsapp : old('no_whatsapp') }}">

                                            @error('no_whatsapp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('visi') ? 'has-error' : ''}}">
                                        <label for="" class="control-label">{{ 'Visi' }}</label>

                                        <div class="col-md-12">

                                            <textarea class="form-control" rows="5" name="visi" type="textarea"
                                                      id="visi" placeholder="visi"
                                                      required>{{ isset($pengaturan->visi) ? $pengaturan->visi : old('visi')}}</textarea>

                                            @error('visi')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group {{ $errors->has('misi') ? 'has-error' : ''}}">
                                        <label for="" class="control-label">{{ 'Misi (Pisahkan dengan tanda -)' }}</label>

                                        <div class="col-md-12">

                                            <textarea class="form-control" rows="5" name="misi" type="textarea"
                                                      id="misi" placeholder="misi"
                                                      required>{{ isset($pengaturan->misi) ? implode("-", json_decode($pengaturan->misi)): old('misi')}}</textarea>

                                            @error('misi')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix" style="height: 10px;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection