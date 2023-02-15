<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($obat->nama) ? $obat->nama : old('nama') }}" >
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="deskripsi" placeholder="deskripsi" >{{ isset($obat->deskripsi) ? $obat->deskripsi : old('deskripsi')}}</textarea>
        
        @error('deskripsi')
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
