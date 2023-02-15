<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($bukutamu->nama) ? $bukutamu->nama : old('nama') }}" required>
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('pesan_kesan') ? 'has-error' : ''}}">
    <label for="pesan_kesan" class="control-label">{{ 'Pesan Kesan' }}</label>
    
<div class="col-md-12">
    <input placeholder="pesan_kesan" class="form-control form-control-line @error('pesan_kesan') is-invalid @enderror" name="pesan_kesan" type="text" id="pesan_kesan" value="{{ isset($bukutamu->pesan_kesan) ? $bukutamu->pesan_kesan : old('pesan_kesan') }}" required>
    
    @error('pesan_kesan')
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
