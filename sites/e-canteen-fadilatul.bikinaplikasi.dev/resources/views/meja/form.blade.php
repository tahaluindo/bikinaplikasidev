<div class="form-group {{ $errors->has('no') ? 'has-error' : ''}}">
    <label for="no" class="control-label">{{ 'No Meja' }}</label>
    
<div class="col-md-12">
    <input placeholder="no" class="form-control form-control-line @error('no') is-invalid @enderror" name="no" type="number" id="no" value="{{ isset($meja->no) ? $meja->no : old('no') }}" required>
    
    @error('no')
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
