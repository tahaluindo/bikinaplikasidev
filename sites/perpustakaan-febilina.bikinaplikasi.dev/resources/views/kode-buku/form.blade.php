<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="kode_buku" class="control-label">{{ 'Kode Buku' }}</label>

    <div class="col-md-12">
        <input placeholder="kode_buku" class="form-control form-control-line @error('kode_buku') is-invalid @enderror"
            name="kode_buku" type="text" id="kode_buku" value="{{ isset($kode_buku->kode_buku) ? $kode_buku->kode_buku : old('kode_buku')}}" required>

        @error('kode_buku')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Keterangan' }}</label>

    <div class="col-md-12">
        <input placeholder="keterangan" class="form-control form-control-line @error('keterangan') is-invalid @enderror"
            name="keterangan" type="text" id="keterangan" value="{{ isset($kode_buku->keterangan) ? $kode_buku->keterangan : old('keterangan')}}" required>

        @error('keterangan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('lokasi_rak') ? 'has-error' : ''}}">
    <label for="lokasi_rak" class="control-label">{{ 'Lokasi Rak' }}</label>

    <div class="col-md-12">
        <input placeholder="lokasi_rak" class="form-control form-control-line @error('lokasi_rak') is-invalid @enderror"
            name="lokasi_rak" type="text" id="lokasi_rak" value="{{ isset($kode_buku->lokasi_rak) ? $kode_buku->lokasi_rak : old('lokasi_rak')}}"
            required>

        @error('lokasi_rak')
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
