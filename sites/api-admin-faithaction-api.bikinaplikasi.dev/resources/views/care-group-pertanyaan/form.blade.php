
<div class="form-group {{ $errors->has('pertanyaan') ? 'has-error' : ''}}">
    <label for="pertanyaan" class="control-label">{{ 'pertanyaan' }}</label>

    <input placeholder="pertanyaan" class="form-control form-control-line @error('pertanyaan') is-invalid @enderror" name="pertanyaan"
           type="text" id="pertanyaan" value="{{ isset($careGroupPertanyaan->pertanyaan) ? $careGroupPertanyaan->pertanyaan : old('pertanyaan') }}" required>

    @error('pertanyaan')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('jawaban') ? 'has-error' : ''}}">
    <label for="jawaban" class="control-label">{{ 'jawaban' }}</label>

    <input placeholder="jawaban" class="form-control form-control-line @error('jawaban') is-invalid @enderror" name="jawaban"
           type="text" id="jawaban" value="{{ isset($careGroupPertanyaan->jawaban) ? $careGroupPertanyaan->jawaban : old('jawaban') }}" required>

    @error('jawaban')
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