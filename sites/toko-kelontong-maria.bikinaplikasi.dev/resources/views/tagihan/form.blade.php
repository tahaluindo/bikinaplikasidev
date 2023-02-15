<div class="form-group {{ $errors->has('pembeli_id') ? 'has-error' : ''}}">
    <label for="pembeli_id" class="control-label">{{ ucwords('Pembeli Id') }}</label>
    
    <div class="col-md-12">

        <select name="pembeli_id" class="form-control form-control-line" id="pembeli_id" required>
            @foreach (json_decode('[{"$id":"$nama"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($tagihan->pembeli_id) && $tagihan->pembeli_id == $optionKey) || old('pembeli_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pembeli_id')
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
