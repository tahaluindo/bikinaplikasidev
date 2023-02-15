<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    
    <div class="col-md-12">

        <select name="user_id" class="form-control form-control-line" id="user_id" required>
            @foreach ($users as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($penjual->user_id) && $penjual->user_id == $optionKey) || old('user_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('user_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="deskripsi" placeholder="deskripsi" required>{{ isset($penjual->deskripsi) ? $penjual->deskripsi : old('deskripsi')}}</textarea>
        
        @error('deskripsi')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('gambar_depan') ? 'has-error' : ''}}">
    <label for="gambar_depan" class="control-label">{{ 'Gambar Depan' }}</label>
    
<div class="col-md-12">
    <input placeholder="gambar_depan" class="form-control form-control-line @error('gambar_depan') is-invalid @enderror" name="gambar_depan" type="file" id="gambar_depan" value="{{ isset($penjual->gambar_depan) ? $penjual->gambar_depan : old('gambar_depan') }}">
    
    @error('gambar_depan')
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
