
<div class="form-group {{ $errors->has('no_meja') ? 'has-error' : ''}}">
    <label for="no_meja" class="control-label">{{ 'No Hp' }}</label>

    <div class="col-md-12">
        <input placeholder="no_meja" class="form-control form-control-line @error('no_meja') is-invalid @enderror"
               name="no_meja" type="text" id="no_meja" value="{{ isset($meja->no_meja) ? $meja->no_meja : old('no_meja') }}"
               required>

        @error('no_meja')
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
