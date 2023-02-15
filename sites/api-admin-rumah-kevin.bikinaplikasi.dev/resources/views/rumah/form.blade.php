<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'status' }}</label>

    <select name="status" class="form-control form-control-line" id="status" required>
        @foreach (['Tersedia','Tidak Tersedia','Baru Diajukan','Ditolak','Diajukan Ulang'] as $optionKey => $optionValue)
            <option value="{{ $optionValue }}"
                {{ (isset($rumah->status) && $rumah->status == $optionValue) || old('status') == $optionValue ? 'selected' : ''}}>
                {{ $optionValue }}</option>
        @endforeach
    </select>

    @error('status')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('alasan_penolakan') ? 'has-error' : ''}}">
    <label for="alasan_penolakan" class="control-label">{{ ucwords('alasan penolakan (jika ditolak)') }}</label>

    <textarea class="form-control" rows="5" name="alasan_penolakan" type="textarea" id="alasan_penolakan"
              placeholder="alasan_penolakan"
    >{{ isset($rumahntrakan->alasan_penolakan) ? $rumah->alasan_penolakan : old('alasan_penolakan')}}</textarea>

    @error('alasan_penolakan')
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
