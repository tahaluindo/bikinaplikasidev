<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ ucwords('Nama') }}</label>
    <div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($pembeli->nama) ? $pembeli->nama : old('nama') }}" required>
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

 </div>

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ ucwords('Keterangan') }}</label>
    
    <textarea class="form-control" rows="5" name="keterangan" type="textarea" id="keterangan" placeholder="keterangan" required>{{ isset($pembeli->keterangan) ? $pembeli->keterangan : old('keterangan')}}</textarea>
    
    @error('keterangan')
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
