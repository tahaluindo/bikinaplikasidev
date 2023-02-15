<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'status' }}</label>

    <select name="status" class="form-control form-control-line" id="status" required>
        @foreach (['Diterima', 'Ditolak', 'Pending'] as $optionKey => $optionValue)
            <option value="{{ $optionValue }}"
                {{ old('status') == $optionValue || request()->status == $optionValue ? 'selected' : ''}}>
                {{ $optionValue }}</option>
        @endforeach
    </select>

    @error('status')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('catatan') ? 'has-error' : ''}}">
    <label for="catatan" class="control-label">{{ 'catatan' }}</label>

    <input placeholder="catatan" class="form-control form-control-line @error('catatan') is-invalid @enderror" name="catatan"
           type="text" id="catatan" value="{{ isset($weCare->catatan) ? $weCare->catatan : old('catatan') }}" required>

    @error('catatan')
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