<div class="form-group {{ $errors->has('fullName') ? 'has-error' : ''}}">
    <label for="fullName" class="control-label">{{ 'Name' }}</label>

    <div class="col-md-12">
        <input placeholder="fullName"
               class="form-control form-control-line @error('fullName') is-invalid @enderror"
               name="fullName" type="text" id="fullName"
               value="{{ isset($user->fullName) ? $user->fullName : old('fullName') }}"
               required>

        @error('fullName')
        <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('hari') ? 'has-error' : ''}}">
    <label for="Jenis Kelamin"
           class="control-label">{{ 'Jenis Kelamin' }}</label>

    <div class="col-md-12">
        <select class="form-control form-control-line" name='jenisKelamin'>
            @foreach(['Laki - Laki', 'Perempuan'] as $item)
                <option value="{{ $item }}"
                        @if(old('care_group_lokasi_id')==$item || isset($user->jenis_kelamin) && $user->jenis_kelamin == $item) selected
                    @endif>{{ $item }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group {{ $errors->has('noHp') ? 'has-error' : ''}}">
    <label for="noHp" class="control-label">{{ 'No Hp' }}</label>

    <div class="col-md-12">
        <input placeholder="noHp"
               class="form-control form-control-line @error('noHp') is-invalid @enderror"
               name="noHp" type="noHp" id="noHp"
               value="{{ isset($user->noHp) ? $user->noHp : old('noHp') }}"
               required>

        @error('noHp')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>

    <div class="col-md-12">
        <input placeholder="email"
               class="form-control form-control-line @error('email') is-invalid @enderror"
               name="email" type="email" id="email"
               value="{{ isset($user->email) ? $user->email : old('email') }}"
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
        <input type="password" class="form-control form-control-line"
               name='password' id="password" required>
        @error('password')
        <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
        @enderror
    </div>
</div>

<div
    class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <label for="password_confirmation"
           class="control-label">{{ 'Password Confirmation' }}</label>

    <div class="col-md-12">
        <input type="password" class="form-control form-control-line"
               name='password_confirmation'
               id="password_confirmation" required>
        @error('password_confirmation')
        <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>

    <div class="col-md-12">
        <input placeholder="alamat"
               class="form-control form-control-line @error('alamat') is-invalid @enderror"
               name="alamat" type="alamat" id="alamat"
               value="{{ isset($user->alamat) ? $user->alamat : old('alamat') }}"
               required>

        @error('alamat')
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

<script>
    var q = "";
    var placeholder = "";
    var urlSearch = "";
</script>