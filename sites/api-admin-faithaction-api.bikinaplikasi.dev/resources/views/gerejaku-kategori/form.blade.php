
<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'nama' }}</label>

    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
           type="text" id="nama" value="{{ isset($gerejakuKategori->nama) ? $gerejakuKategori->nama : old('nama') }}" required>

    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>

<script>
    var q = "";
    var placeholder = "";
    var urlSearch = "";
</script>