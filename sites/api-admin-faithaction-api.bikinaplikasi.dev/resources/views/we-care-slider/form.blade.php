<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'status' }}</label>

    <select name="status" class="form-control form-control-line" id="status" required>
        @foreach (['Aktif', 'Tidak Aktif'] as $optionKey => $optionValue)
            <option value="{{ $optionValue }}"
                {{ (isset($weCareSlider->status) && $weCareSlider->status == $optionValue) || old('status') == $optionValue ? 'selected' : ''}}>
                {{ $optionValue }}</option>
        @endforeach
    </select>

    @error('status')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'gambar' }}</label>

    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
           name="gambar"
           type="file" id="gambar" value="{{ isset($weCareSlider->gambar) ? $weCareSlider->gambar : old('gambar') }}">

    @error('gambar')
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