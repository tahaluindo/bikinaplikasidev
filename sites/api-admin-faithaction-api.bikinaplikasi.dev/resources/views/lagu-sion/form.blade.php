<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'judul' }}</label>

    <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"
           type="text" id="judul" value="{{ isset($laguSion->judul) ? $laguSion->judul : old('judul') }}" required>

    @error('judul')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('lirik') ? 'has-error' : ''}}">
    <label for="lirik" class="control-label">{{ ucwords('Lirik') }}</label>

    <textarea class="form-control" rows="5" name="lirik" type="textarea" id="editor-0"
              placeholder="lirik">{{ isset($laguSion->lirik) ? $laguSion->lirik : old('lirik')}}</textarea>

    @error('lirik')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('audio') ? 'has-error' : ''}}">
    <label for="audio" class="control-label">{{ 'audio' }}</label>

    <input placeholder="audio" class="form-control form-control-line @error('audio') is-invalid @enderror" name="audio"
           type="file" id="audio" value="{{ isset($laguSion->audio) ? $laguSion->audio : old('audio') }}" accept="audio/*">

    @error('audio')
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