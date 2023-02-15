<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ ucwords('User Id') }}</label>
    
    <div class="col-md-12">

        <select name="user_id" class="form-control form-control-line" id="user_id" >
            @foreach (json_decode('{"key":"value"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($disukai->user_id) && $disukai->user_id == $optionKey) || old('user_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('user_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

 </div>

<div class="form-group {{ $errors->has('kos_id') ? 'has-error' : ''}}">
    <label for="kos_id" class="control-label">{{ ucwords('Kos Id') }}</label>
    
    <div class="col-md-12">

        <select name="kos_id" class="form-control form-control-line" id="kos_id" >
            @foreach (json_decode('{"key":"value"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($disukai->kos_id) && $disukai->kos_id == $optionKey) || old('kos_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kos_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

 </div>

<div class="form-group {{ $errors->has('komentar') ? 'has-error' : ''}}">
    <label for="komentar" class="control-label">{{ ucwords('Komentar') }}</label>
    
    <textarea class="form-control" rows="5" name="komentar" type="textarea" id="komentar" placeholder="komentar" >{{ isset($disukai->komentar) ? $disukai->komentar : old('komentar')}}</textarea>
    
    @error('komentar')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

 </div>

<div class="form-group {{ $errors->has('disukai') ? 'has-error' : ''}}">
    <label for="disukai" class="control-label">{{ ucwords('Disukai') }}</label>
    
    <div class="col-md-12">

        <select name="disukai" class="form-control form-control-line" id="disukai" >
            @foreach (json_decode('{"Ya":"Ya","Tidak":"Tidak"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($disukai->disukai) && $disukai->disukai == $optionKey) || old('disukai') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('disukai')
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
