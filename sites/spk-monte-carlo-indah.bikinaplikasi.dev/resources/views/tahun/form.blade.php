<div class="form-group {{ $errors->has('tahun') ? 'has-error' : ''}}">
    <label for="tahun" class="control-label">{{ 'Tahun' }}</label>
    
<div class="col-md-12">
    <input placeholder="tahun" class="form-control form-control-line @error('tahun') is-invalid @enderror" name="tahun" type="text" id="tahun" value="{{ isset($tahun->tahun) ? $tahun->tahun : old('tahun') }}" >
    
    @error('tahun')
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
