<div class="form-group {{ $errors->has('kategori') ? 'has-error' : ''}}">
    <label for="gerejaku_kategori_id" class="control-label">{{ 'gerejaku_kategori_id' }}</label>

    <select name="gerejaku_kategori_id" class="form-control form-control-line" id="gerejaku_kategori_id" required>
        @foreach ($gerejakuKategori as $optionKey => $optionValue)
            <option value="{{ $optionKey }}"
                {{ (isset($gerejaku->kategori) && $gerejaku->gerejaku_kategori_id == $optionKey) || old('gerejaku_kategori_id') == $optionValue ? 'selected' : ''}}>
                {{ $optionValue }}</option>
        @endforeach
    </select>

    @error('gerejaku_kategori_id')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'judul' }}</label>

    <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"
           type="text" id="judul" value="{{ isset($gerejaku->judul) ? $gerejaku->judul : old('judul') }}" required>

    @error('judul')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('dariJam') ? 'has-error' : ''}}">
    <label for="dariJam" class="control-label">{{ 'dari Jam' }}</label>

    <input placeholder="dariJam" class="form-control form-control-line @error('dariJam') is-invalid @enderror" name="dariJam"
           type="text" id="dariJam" value="{{ isset($gerejaku->dariJam) ? $gerejaku->dariJam : old('dariJam') }}" required>

    @error('dariJam')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('sampaiJam') ? 'has-error' : ''}}">
    <label for="sampaiJam" class="control-label">{{ 'sampai Jam' }}</label>

    <input placeholder="sampaiJam" class="form-control form-control-line @error('sampaiJam') is-invalid @enderror" name="sampaiJam"
           type="text" id="sampaiJam" value="{{ isset($gerejaku->sampaiJam) ? $gerejaku->sampaiJam : old('sampaiJam') }}" required>

    @error('sampaiJam')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'tanggal' }}</label>

    <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror" name="tanggal"
           type="date" id="tanggal" value="{{ isset($gerejaku->tanggal) ? $gerejaku->tanggal : old('tanggal') }}" required>

    @error('tanggal')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'gambar' }}</label>

    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror" name="gambar"
           type="file" id="gambar" value="{{ isset($gerejaku->gambar) ? $gerejaku->gambar : old('gambar') }}">

    @error('gambar')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('isi') ? 'has-error' : ''}}">
    <label for="isi" class="control-label">{{ ucwords('Isi') }}</label>

    <textarea class="form-control" rows="5" name="isi" type="textarea" id="editor-0"
              placeholder="isi"
    >{{ isset($gerejaku->isi) ? $gerejaku->isi : old('isi')}}</textarea>

    @error('isi')
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