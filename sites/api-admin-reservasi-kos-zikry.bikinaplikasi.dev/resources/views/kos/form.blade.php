<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ ucwords('Nama') }}</label>
    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" id="nama" value="{{ isset($ko->nama) ? $ko->nama : old('nama') }}"
               required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('pemilik') ? 'has-error' : ''}}">
    <label for="pemilik" class="control-label">{{ ucwords('Pemilik') }}</label>
    <div class="col-md-12">
        <input placeholder="pemilik" class="form-control form-control-line @error('pemilik') is-invalid @enderror"
               name="pemilik" type="text" id="pemilik" value="{{ isset($ko->pemilik) ? $ko->pemilik : old('pemilik') }}"
               required>

        @error('pemilik')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('alamat_lengkap') ? 'has-error' : ''}}">
    <label for="alamat_lengkap" class="control-label">{{ ucwords('Alamat Lengkap') }}</label>

    <textarea class="form-control" rows="5" name="alamat_lengkap" type="textarea" id="alamat_lengkap"
              placeholder="alamat_lengkap"
              required>{{ isset($ko->alamat_lengkap) ? $ko->alamat_lengkap : old('alamat_lengkap')}}</textarea>

    @error('alamat_lengkap')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<div class="form-group {{ $errors->has('alamat_gmaps') ? 'has-error' : ''}}">
    <label for="alamat_gmaps" class="control-label">{{ ucwords('Alamat Gmaps') }}</label>

    <textarea class="form-control" rows="5" name="alamat_gmaps" type="textarea" id="alamat_gmaps"
              placeholder="alamat_gmaps"
              required>{{ isset($ko->alamat_gmaps) ? $ko->alamat_gmaps : old('alamat_gmaps')}}</textarea>

    @error('alamat_gmaps')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ ucwords('Deskripsi') }}</label>

    <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="deskripsi" placeholder="deskripsi"
              required>{{ isset($ko->deskripsi) ? $ko->deskripsi : old('deskripsi')}}</textarea>

    @error('deskripsi')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ ucwords('No Hp') }}</label>
    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror"
               name="no_hp" type="text" id="no_hp" value="{{ isset($ko->no_hp) ? $ko->no_hp : old('no_hp') }}" required>

        @error('no_hp')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('jumlah_kamar') ? 'has-error' : ''}}">
    <label for="jumlah_kamar" class="control-label">{{ ucwords('Jumlah Kamar') }}</label>
    <div class="col-md-12">
        <input placeholder="jumlah_kamar"
               class="form-control form-control-line @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar"
               type="text" id="jumlah_kamar"
               value="{{ isset($ko->jumlah_kamar) ? $ko->jumlah_kamar : old('jumlah_kamar') }}" required>

        @error('jumlah_kamar')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('fasilitas') ? 'has-error' : ''}}">
    <label for="fasilitas" class="control-label">{{ ucwords('Fasilitas (Pisahkan dengan koma)') }}</label>
    <div class="col-md-12">
        <input placeholder="fasilitas" class="form-control form-control-line @error('fasilitas') is-invalid @enderror"
               name="fasilitas" type="text" id="fasilitas"
               value="{{ isset($ko->fasilitas) ? $ko->fasilitas : old('fasilitas') }}" required>

        @error('fasilitas')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ ucwords('Gambar') }}</label>
    <div class="col-md-12">
        <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
               name="gambar" type="file" id="gambar" value="{{ isset($ko->gambar) ? $ko->gambar : old('gambar') }}"
        >

        @error('gambar')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

{{--<div class="form-group {{ $errors->has('gambar2') ? 'has-error' : ''}}">--}}
{{--    <label for="gambar2" class="control-label">{{ ucwords('Gambar 2') }}</label>--}}
{{--    <div class="col-md-12">--}}
{{--        <input placeholder="gambar2" class="form-control form-control-line @error('gambar2') is-invalid @enderror"--}}
{{--               name="gambar2" type="file" id="gambar2" value="{{ isset($ko->gambar2) ? $ko->gambar2 : old('gambar2') }}"--}}
{{--        >--}}

{{--        @error('gambar2')--}}
{{--        <span class="invalid-feedback text-danger" role="alert">--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--</div>--}}

{{--<div class="form-group {{ $errors->has('gambar3') ? 'has-error' : ''}}">--}}
{{--    <label for="gambar3" class="control-label">{{ ucwords('Gambar 3') }}</label>--}}
{{--    <div class="col-md-12">--}}
{{--        <input placeholder="gambar3" class="form-control form-control-line @error('gambar3') is-invalid @enderror"--}}
{{--               name="gambar3" type="file" id="gambar3" value="{{ isset($ko->gambar3) ? $ko->gambar3 : old('gambar3') }}"--}}
{{--        >--}}

{{--        @error('gambar3')--}}
{{--        <span class="invalid-feedback text-danger" role="alert">--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--</div>--}}

{{--<div class="form-group {{ $errors->has('gambar4') ? 'has-error' : ''}}">--}}
{{--    <label for="gambar4" class="control-label">{{ ucwords('Gambar 4') }}</label>--}}
{{--    <div class="col-md-12">--}}
{{--        <input placeholder="gambar4" class="form-control form-control-line @error('gambar4') is-invalid @enderror"--}}
{{--               name="gambar4" type="file" id="gambar4" value="{{ isset($ko->gambar4) ? $ko->gambar4 : old('gambar4') }}"--}}
{{--        >--}}

{{--        @error('gambar4')--}}
{{--        <span class="invalid-feedback text-danger" role="alert">--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--</div>--}}

{{--<div class="form-group {{ $errors->has('gambar5') ? 'has-error' : ''}}">--}}
{{--    <label for="gambar5" class="control-label">{{ ucwords('Gambar 5') }}</label>--}}
{{--    <div class="col-md-12">--}}
{{--        <input placeholder="gambar5" class="form-control form-control-line @error('gambar5') is-invalid @enderror"--}}
{{--               name="gambar5" type="file" id="gambar5" value="{{ isset($ko->gambar5) ? $ko->gambar5 : old('gambar5') }}"--}}
{{--        >--}}

{{--        @error('gambar5')--}}
{{--        <span class="invalid-feedback text-danger" role="alert">--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--</div>--}}

<div class="form-group {{ $errors->has('kategori') ? 'has-error' : ''}}">
    <label for="kategori" class="control-label">{{ ucwords('Kategori') }}</label>

    <div class="col-md-12">

        <select name="kategori" class="form-control form-control-line" id="kategori" required>
            @foreach (json_decode('{"Laki - Laki":"Laki - Laki","Perempuan":"Perempuan","Laki - Laki \/ Perempuan":"Laki - Laki \/ Perempuan"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($ko->kategori) && $ko->kategori == $optionKey) || old('kategori') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kategori')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('harga_terendah') ? 'has-error' : ''}}">
    <label for="harga_terendah" class="control-label">{{ ucwords('Harga Terendah (Perbulan)') }}</label>
    <div class="col-md-12">
        <input placeholder="harga_terendah"
               class="form-control form-control-line @error('harga_terendah') is-invalid @enderror"
               name="harga_terendah" type="number" id="harga_terendah"
               value="{{ isset($ko->harga_terendah) ? $ko->harga_terendah : old('harga_terendah') }}" required>

        @error('harga_terendah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('harga_tertinggi') ? 'has-error' : ''}}">
    <label for="harga_tertinggi" class="control-label">{{ ucwords('Harga Tertinggi (Perbulan)') }}</label>
    <div class="col-md-12">
        <input placeholder="harga_tertinggi"
               class="form-control form-control-line @error('harga_tertinggi') is-invalid @enderror"
               name="harga_tertinggi" type="number" id="harga_tertinggi"
               value="{{ isset($ko->harga_tertinggi) ? $ko->harga_tertinggi : old('harga_tertinggi') }}" required>

        @error('harga_tertinggi')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('kamar_kosong') ? 'has-error' : ''}}">
    <label for="kamar_kosong" class="control-label">{{ ucwords('Kamar Kosong') }}</label>
    <div class="col-md-12">
        <input placeholder="kamar_kosong"
               class="form-control form-control-line @error('kamar_kosong') is-invalid @enderror"
               name="kamar_kosong" type="number" id="kamar_kosong"
               value="{{ isset($ko->kamar_kosong) ? $ko->kamar_kosong : old('kamar_kosong') }}" required>

        @error('kamar_kosong')
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
