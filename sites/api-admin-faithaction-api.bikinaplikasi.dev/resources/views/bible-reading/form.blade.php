<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul_id" class="control-label">{{ 'judul_id' }}</label>

    <select name="judul_id" class="form-control form-control-line" id="judul_id" required>
        @foreach ($judul as $optionKey => $optionValue)
            <option value="{{ $optionValue->id }}"
                {{ (isset($bibleReading->judul) && $bibleReading->judul_id == $optionValue->id) || old('judul') == $optionValue ? 'selected' : ''}}>
                {{ $optionValue->judul }}</option>
        @endforeach
    </select>

    @error('judul_id')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'tanggal' }}</label>

    <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror"
           name="tanggal"
           type="date" id="tanggal" value="{{ isset($bibleReading->tanggal) ? $bibleReading->tanggal : old('tanggal') }}" required>

    @error('tanggal')
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