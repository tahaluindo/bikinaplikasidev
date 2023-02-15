<h4>Data Login</h4>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>

    <div class="col-md-12">
        <input placeholder="email" class="form-control form-control-line @error('email') is-invalid @enderror"
               name="email" type="email" id="email" value="{{ isset($guru->user->email) ? $guru->user->email : old('email') }}"
               required>

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


<h4>Data Pribadi</h4>

<div class="form-group {{ $errors->has('nip') ? 'has-error' : ''}}">
    <label for="nip" class="control-label">{{ ucwords('Nip') }}</label>
    <div class="col-md-12">
        <input placeholder="nip" class="form-control form-control-line @error('nip') is-invalid @enderror" name="nip"
               type="text" id="nip" value="{{ isset($guru->nip) ? $guru->nip : old('nip') }}">

        @error('nip')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ ucwords('Nama') }}</label>
    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($guru->nama) ? $guru->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
    <label for="jenis_kelamin" class="control-label">{{ ucwords('Jenis Kelamin') }}</label>

    <div class="col-md-12">

        <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin" required>
            @foreach (["Laki - Laki" => "Laki - Laki", "Perempuan" => "Perempuan"] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($guru->jenis_kelamin) && $guru->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenis_kelamin')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ ucwords('Alamat') }}</label>

    <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
              required>{{ isset($guru->alamat) ? $guru->alamat : old('alamat')}}</textarea>

    @error('alamat')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ ucwords('Foto') }}</label>
    <div class="col-md-12">
        <input placeholder="foto" class="form-control form-control-line @error('foto') is-invalid @enderror"
               name="foto" type="file" id="foto"
               value="{{ isset($siswa->foto) ? $siswa->foto : old('foto') }}">

        @error('foto')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('lulusan') ? 'has-error' : ''}}">
    <label for="lulusan" class="control-label">{{ ucwords('Lulusan') }}</label>

    <div class="col-md-12">

        <select name="lulusan" class="form-control form-control-line" id="lulusan" required>
            @foreach (["D3" => "D3", "S1" => "S1", "S2" => "S2", "S3" => "S3"] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($guru->lulusan) && $guru->lulusan == $optionKey) || old('lulusan') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('lulusan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


<div class="form-group">
    <div class="col-sm-12" style="margin-top: 15px;">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>