<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($pasien->nama) ? $pasien->nama : old('nama') }}" >
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('umur') ? 'has-error' : ''}}">
    <label for="umur" class="control-label">{{ 'Umur' }}</label>
    
<div class="col-md-12">
    <input placeholder="umur" class="form-control form-control-line @error('umur') is-invalid @enderror" name="umur" type="number" id="umur" value="{{ isset($pasien->umur) ? $pasien->umur : old('umur') }}" >
    
    @error('umur')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat" >{{ isset($pasien->alamat) ? $pasien->alamat : old('alamat')}}</textarea>
        
        @error('alamat')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
    <label for="jenis_kelamin" class="control-label">{{ 'Jenis Kelamin' }}</label>
    
    <div class="col-md-12">

        <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin" >
            @foreach (["Laki - Laki" => "Laki - Laki", "Perempuan" => "Perempuan"] as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pasien->jenis_kelamin) && $pasien->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenis_kelamin')
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
