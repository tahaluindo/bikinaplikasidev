<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
            type="text" id="nama" value="{{ isset($perhitungan->nama) ? $perhitungan->nama : old('nama')}}" required>

        @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('urutan_prioritas') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Keterangan' }}</label>

    <div class="col-md-12">
        <input placeholder="keterangan"
            class="form-control form-control-line @error('keterangan') is-invalid @enderror" name="keterangan"
            type="text" id="keterangan" value="{{ isset($perhitungan->keterangan) ? $perhitungan->keterangan : old('keterangan')}}"
            required>

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
