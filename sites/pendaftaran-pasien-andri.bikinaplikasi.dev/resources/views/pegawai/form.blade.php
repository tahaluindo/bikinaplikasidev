<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    
    <div class="col-md-12">

        <select name="user_id" class="form-control form-control-line" id="user_id" >
            @foreach ($users as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pegawai->user_id) && $pegawai->user_id == $optionKey) || old('user_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('user_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($pegawai->nama) ? $pegawai->nama : old('nama') }}" >
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : ''}}">
    <label for="tanggal_lahir" class="control-label">{{ 'Tanggal Lahir' }}</label>
    
<div class="col-md-12">
    <input placeholder="tanggal_lahir" class="form-control form-control-line @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" type="date" id="tanggal_lahir" value="{{ isset($pegawai->tanggal_lahir) ? $pegawai->tanggal_lahir : old('tanggal_lahir') }}" >
    
    @error('tanggal_lahir')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat" >{{ isset($pegawai->alamat) ? $pegawai->alamat : old('alamat')}}</textarea>
        
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
            @foreach (["Laki - Laki" => "Laki - Laki","Perempuan" => "Perempuan"] as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pegawai->jenis_kelamin) && $pegawai->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
