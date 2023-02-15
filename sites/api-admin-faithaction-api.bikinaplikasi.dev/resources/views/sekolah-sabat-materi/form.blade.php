<input type="hidden" name="sekolah_sabat_id" value="{{ request()->sekolah_sabat_id }}">

<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'judul' }}</label>

    <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"
           type="text" id="judul" value="{{ isset($sekolahSabatMateri->judul) ? $sekolahSabatMateri->judul : old('judul') }}" required>

    @error('judul')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'tanggal' }}</label>

    <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror" name="tanggal"
           type="text" id="tanggal" value="{{ isset($sekolahSabatMateri->tanggal) ? $sekolahSabatMateri->tanggal : old('tanggal') }}" required>

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