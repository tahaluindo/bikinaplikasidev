<div class="form-group {{ $errors->has('nama_developer') ? 'has-error' : ''}}">
    <label for="nama_developer" class="control-label">{{ ucwords('Nama Developer') }}</label>
    <div class="col-md-12">
    <input placeholder="nama_developer" class="form-control form-control-line @error('nama_developer') is-invalid @enderror" name="nama_developer" type="text" id="nama_developer" value="{{ isset($tentang->nama_developer) ? $tentang->nama_developer : old('nama_developer') }}" required>
    
    @error('nama_developer')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

 </div>

<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ ucwords('Deskripsi') }}</label>
    
    <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="deskripsi" placeholder="deskripsi" required>{{ isset($tentang->deskripsi) ? $tentang->deskripsi : old('deskripsi')}}</textarea>
    
    @error('deskripsi')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

 </div>

<div class="form-group {{ $errors->has('versi') ? 'has-error' : ''}}">
    <label for="versi" class="control-label">{{ ucwords('Versi') }}</label>
    <div class="col-md-12">
    <input placeholder="versi" class="form-control form-control-line @error('versi') is-invalid @enderror" name="versi" type="number" id="versi" value="{{ isset($tentang->versi) ? $tentang->versi : old('versi') }}" required>
    
    @error('versi')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

 </div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ ucwords('Email') }}</label>
    <div class="col-md-12">
    <input placeholder="email" class="form-control form-control-line @error('email') is-invalid @enderror" name="email" type="email" id="email" value="{{ isset($tentang->email) ? $tentang->email : old('email') }}" required>
    
    @error('email')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

 </div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ ucwords('No Hp') }}</label>
    <div class="col-md-12">
    <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror" name="no_hp" type="text" id="no_hp" value="{{ isset($tentang->no_hp) ? $tentang->no_hp : old('no_hp') }}" required>
    
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
