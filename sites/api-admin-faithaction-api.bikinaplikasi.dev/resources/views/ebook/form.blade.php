<div class="form-group {{ $errors->has('kategori') ? 'has-error' : ''}}">
    <label for="ebook_kategori_id" class="control-label">{{ 'ebook_kategori_id' }}</label>

    <select name="ebook_kategori_id" class="form-control form-control-line" id="ebook_kategori_id" required>
        @foreach ($ebook_kategori as $optionKey => $optionValue)
            <option value="{{ $optionKey }}"
                {{ (isset($ebook->kategori) && $ebook->kategori == $optionValue) || old('kategori') == $optionValue ? 'selected' : ''}}>
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
           type="text" id="judul" value="{{ isset($ebook->judul) ? $ebook->judul : old('judul') }}" required>

    @error('judul')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{--<div class="form-group {{ $errors->has('isi') ? 'has-error' : ''}}">--}}
{{--    <label for="isi" class="control-label">{{ ucwords('Isi') }}</label>--}}

{{--    <textarea class="form-control" rows="5" name="isi" type="textarea" id="editor-0"--}}
{{--              placeholder="isi"--}}
{{--    >{{ isset($ebook->isi) ? $ebook->isi : old('isi')}}</textarea>--}}

{{--    @error('isi')--}}
{{--    <span class="invalid-feedback text-danger" role="alert">--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </span>--}}
{{--    @enderror--}}
{{--</div>--}}

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'gambar' }}</label>

    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
           name="gambar"
           type="file" id="gambar" value="{{ isset($ebook->gambar) ? $ebook->gambar : old('gambar') }}">

    @error('gambar')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('filePdf') ? 'has-error' : ''}}">
    <label for="filePdf" class="control-label">{{ 'filePdf' }}</label>

    <input placeholder="filePdf" class="form-control form-control-line @error('filePdf') is-invalid @enderror"
           name="filePdf"
           type="file" id="filePdf" value="{{ isset($berita->filePdf) ? $berita->filePdf : old('filePdf') }}" accept="application/pdf">

    @error('filePdf')
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