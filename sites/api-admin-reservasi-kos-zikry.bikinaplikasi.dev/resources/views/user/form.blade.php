<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>

    <div class="col-md-12">
        <input placeholder="name" class="form-control form-control-line @error('name') is-invalid @enderror" name="name"
               type="text" id="name" value="{{ isset($user->name) ? $user->name : old('name') }}" required>

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
            @foreach (["Pengunjung" => "Pengunjung"] as $optionKey => $optionValue)
                <option value="{{ $optionKey }}"
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

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (["Pengunjung" => "Pengunjung"] as $optionKey => $optionValue)
                <option value="{{ $optionKey }}"
                    {{ (isset($user->status) && $user->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>