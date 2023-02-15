<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($pelanggan->nama) ? $pelanggan->nama : old('nama') }}" required>
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'No Hp' }}</label>
    
<div class="col-md-12">
    <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror" name="no_hp" type="text" id="no_hp" value="{{ isset($pelanggan->no_hp) ? $pelanggan->no_hp : old('no_hp') }}" required>
    
    @error('no_hp')
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
