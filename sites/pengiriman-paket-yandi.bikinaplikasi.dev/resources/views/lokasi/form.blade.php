
<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="nama form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" min="0" id="nama"
               value="{{ isset($lokasi->nama) ? $lokasi->nama : (old('nama') == "" ? "" : old('nama')) }}"
               required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


