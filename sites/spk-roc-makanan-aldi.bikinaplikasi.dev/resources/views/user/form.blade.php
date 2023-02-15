<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($user->nama) ? $user->nama : old('nama') }}" >

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
<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <label for="password_confirmation" class="control-label">{{ 'Password Confirmation' }}</label>

    <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name='password_confirmation' id="password_confirmation" required>
        @error('password_confirmation')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

@if(auth()->user()->level == 'Admin')
<div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
    <label for="level" class="control-label">{{ 'Level' }}</label>

    <div class="col-md-12">
        <select name="level" class="form-control form-control-line" id="level">
            @foreach (['Admin' => 'Admin', 'Pengguna' => 'Pengguna'] as $key => $item)
                <option value="{{ $key }}"
                    {{ (isset($user->genre) && $user->level == $key) || old('level') == $key ? 'selected' : '' }}>
                    {{ $item }}</option>
            @endforeach
        </select>

        @error('level')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
