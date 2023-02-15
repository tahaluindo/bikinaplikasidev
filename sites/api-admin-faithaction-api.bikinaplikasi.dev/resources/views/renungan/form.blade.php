<div class="form-group {{ $errors->has('kategori') ? 'has-error' : ''}}">
    <label for="renungan_kategori_id" class="control-label">{{ 'renungan_kategori_id' }}</label>

    <select name="renungan_kategori_id" class="form-control form-control-line" id="renungan_kategori_id" required>
        @foreach ($renungan_kategori as $optionKey => $optionValue)
            <option value="{{ $optionKey }}"
                {{ (isset($renungan->kategori) && $renungan->kategori == $optionValue) || old('kategori') == $optionValue ? 'selected' : ''}}>
                {{ $optionValue }}</option>
        @endforeach
    </select>

    @error('kategori')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'judul' }}</label>

    <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"
           type="text" id="judul" value="{{ isset($renungan->judul) ? $renungan->judul : old('judul') }}" required>

    @error('judul')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('isi') ? 'has-error' : ''}}">
    <label for="isi" class="control-label">{{ ucwords('Isi') }}</label>

    <textarea class="form-control" rows="5" name="isi" type="textarea" id="editor-0"
              placeholder="isi"
    >{{ isset($renungan->isi) ? $renungan->isi : old('isi')}}</textarea>

    @error('isi')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'gambar' }}</label>

    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
           name="gambar"
           type="file" id="gambar" value="{{ isset($renungan->gambar) ? $renungan->gambar : old('gambar') }}">

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