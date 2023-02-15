<input type="hidden" name="kelas_id" value="{{ request()->kelas_id }}">

<div class="form-group {{ $errors->has('siswa_id') ? 'has-error' : ''}}">
    <label for="siswa_id" class="control-label">{{ ucwords('Siswa Id') }}</label>

    <div class="col-md-12">

        <select name="siswa_id" class="form-control form-control-line" id="siswa_id" required>
            @foreach ($siswa as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kelasdetail->siswa_id) && $kelasdetail->siswa_id == $optionKey) || old('siswa_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('siswa_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
