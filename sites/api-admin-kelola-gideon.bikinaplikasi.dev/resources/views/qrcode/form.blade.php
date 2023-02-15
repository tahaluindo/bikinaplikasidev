<div class="form-group {{ $errors->has('nominal') ? 'has-error' : ''}}">
    <label for="nominal" class="control-label">{{ 'nominal' }}</label>

    <input placeholder="nominal" class="form-control form-control-line @error('nominal') is-invalid @enderror"
           name="nominal"
           type="number" id="nominal" value="{{ isset($gereja->nominal) ? $gereja->nominal : old('nominal') }}"
           required>

    @error('nominal')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
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