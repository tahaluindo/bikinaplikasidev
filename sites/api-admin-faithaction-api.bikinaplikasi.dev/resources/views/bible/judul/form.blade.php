<input type="hidden" name="bible_id" value="{{ request()->bible_id }}">

{{--<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">--}}
{{--    <label for="judul" class="control-label">{{ 'judul (Manual)' }}</label>--}}

{{--    <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"--}}
{{--           type="text" id="judul" value="{{ isset($judul->judul) ? $judul->judul : old('judul') }}">--}}

{{--    @error('judul')--}}
{{--    <span class="invalid-feedback text-danger" role="alert">--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--    @enderror--}}
{{--</div>--}}

<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ ucwords('Judul (Otomatis, tempelkan HTML disini)') }}</label>

    <textarea class="form-control" rows="5" name="judul" type="textarea" id=""
              placeholder="judul"
    >{{ isset($judul->judul) ? $judul->judul : old('judul')}}</textarea>

    @error('judul')
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