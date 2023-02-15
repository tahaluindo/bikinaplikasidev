<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>

    <div class="col-md-12">
        <input placeholder="name" class="form-control form-control-line @error('name') is-invalid @enderror" name="name"
               type="text" id="name" value="{{ isset($user->name) ? $user->name : old('name') }}">

        @error('name')
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

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'No Hp' }}</label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror"
               name="no_hp" type="number" id="no_hp" value="{{ isset($user->no_hp) ? $user->no_hp : old('no_hp') }}"
               required>

        @error('no_hp')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>

    <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name='password' id="password">
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
               id="password_confirmation">
        @error('password_confirmation')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>

    <div class="col-md-12">

        @if(isset($user))
            <img
                src="{{ url($user->foto != "" ? $user->foto : "image/no_image.png") }}"
                width="100">

            <p>
                @endif

                <input placeholder="foto"
                       class="form-control form-control-line @error('foto') is-invalid @enderror"
                       name="foto" type="file" id="foto"
                       value="{{ isset($user->foto) ? $user->foto : old('foto') }}">

                @error('foto')
                <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('dokumen_penting') ? 'has-error' : ''}}">
    <label for="dokumen_penting" class="control-label">{{ 'Dokumen Penting' }}</label>

    <div class="col-md-12">
        <input placeholder="dokumen_penting"
               class="form-control form-control-line @error('dokumen_penting') is-invalid @enderror"
               name="dokumen_penting" type="file" id="dokumen_penting"
               value="{{ isset($user->dokumen_penting) ? $user->dokumen_penting : old('dokumen_penting') }}">

        @error('dokumen_penting')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label">{{ 'Level' }}</label>

    <div class="col-md-12">
        <select name="level" class="form-control form-control-line" id="level">
            @foreach (['Supir' => 'Supir', 'Pelanggan' => 'Pelanggan'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($user->level) && $user->level == $optionKey) || old('level') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('level')
        <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>
