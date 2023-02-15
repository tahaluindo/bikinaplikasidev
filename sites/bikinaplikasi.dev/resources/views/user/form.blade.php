<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($user->nama) ? $user->nama : old('nama') }}" required>
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    
<div class="col-md-12">
    <input placeholder="email" class="form-control form-control-line @error('email') is-invalid @enderror" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : old('email') }}" required>
    
    @error('email')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    
    <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name='password' id="password" required>
        @error('password')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'No Hp' }}</label>
    
<div class="col-md-12">
    <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror" name="no_hp" type="number" id="no_hp" value="{{ isset($user->no_hp) ? $user->no_hp : old('no_hp') }}" required>
    
    @error('no_hp')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label">{{ 'Level' }}</label>
    
    <div class="col-md-12">

        <select name="level" class="form-control form-control-line" id="level" required>
            @foreach (json_decode('{"Admin":"Admin","Pelanggan":"Pelanggan","Karyawan":"Karyawan"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($user->level) && $user->level == $optionKey) || old('level') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('level')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    
    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (json_decode('{"Aktif":"Aktif","Tidak Aktif":"Tidak Aktif"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($user->status) && $user->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    
<div class="col-md-12">
    <input placeholder="foto" class="form-control form-control-line @error('foto') is-invalid @enderror" name="foto" type="text" id="foto" value="{{ isset($user->foto) ? $user->foto : old('foto') }}" >
    
    @error('foto')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('verified_at') ? 'has-error' : ''}}">
    <label for="verified_at" class="control-label">{{ 'Verified At' }}</label>
    
    <div class="col-md-12">
        <input placeholder="verified_at" class="form-control form-control-line @error('verified_at') is-invalid @enderror" name="verified_at" type="datetime-local" id="verified_at" value="{{ isset($user->verified_at) ? $user->verified_at : old('verified_at')}}" >
        
        @error('verified_at')
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
