
<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'judul' }}</label>

    <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"
           type="text" id="judul" value="{{ isset($sekolahSabat->judul) ? $sekolahSabat->judul : old('judul') }}" required>

    @error('judul')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'gambar' }}</label>

    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
           name="gambar"
           type="file" id="gambar" value="{{ isset($sekolahSabat->gambar) ? $sekolahSabat->gambar : old('gambar') }}" accept="image/*">

    @error('gambar')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('bulan') ? 'has-error' : ''}}">
    <label for="bulan" class="control-label">{{ 'bulan' }}</label>

    <input placeholder="bulan" class="form-control form-control-line @error('bulan') is-invalid @enderror"
           name="bulan"
           type="text" id="bulan" value="{{ isset($sekolahSabat->bulan) ? $sekolahSabat->bulan : old('bulan') }}">

    @error('bulan')
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