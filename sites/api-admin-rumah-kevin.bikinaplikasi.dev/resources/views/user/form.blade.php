<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($user->nama) ? $user->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
    <label for="jenis_kelamin" class="control-label">{{ 'Jenis Kelamin' }}</label>

    <div class="col-md-12">

        <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin" required>
            @foreach (['Laki - Laki','Perempuan'] as $optionKey => $optionValue)
                <option value="{{ $optionValue }}"
                    {{ (isset($user->jenis_kelamin) && $user->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenis_kelamin')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'no_hp' }}</label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror" name="no_hp"
               type="text" id="no_hp" value="{{ isset($user->no_hp) ? $user->no_hp : old('no_hp') }}" required>

        @error('no_hp')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>

    <div class="col-md-12">
        <input placeholder="email" class="form-control form-control-line @error('email') is-invalid @enderror"
               name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : old('email') }}"
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

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <label for="password_confirmation" class="control-label">{{ 'Password Confirmation' }}</label>

    <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name='password_confirmation'
               id="password_confirmation" required>
        @error('password_confirmation')
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
            @foreach (['Pemilik','Pengunjung'] as $optionKey => $optionValue)
                <option value="{{ $optionValue }}"
                    {{ (isset($user->level) && $user->level == $optionKey) || old('level') == $optionKey ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('level')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('is_verifikasi') ? 'has-error' : ''}}">
    <label for="is_verifikasi" class="control-label">{{ 'is verifikasi' }}</label>

    <div class="col-md-12">

        <select name="is_verifikasi" class="form-control form-control-line" id="is_verifikasi" required>
            @foreach (['0','1'] as $optionKey => $optionValue)
                <option value="{{ $optionValue }}"
                    {{ (isset($user->is_verifikasi) && $user->is_verifikasi == $optionKey) || old('is_verifikasi') == $optionKey ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('is_verifikasi')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
