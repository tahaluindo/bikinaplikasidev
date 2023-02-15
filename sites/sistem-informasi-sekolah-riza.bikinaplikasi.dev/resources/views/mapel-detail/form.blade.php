<input type="hidden" name="mapel_id" value="{{ request()->mapel_id ?? $mapel_detail->mapel->id }}">

<div class="form-group {{ $errors->has('guru_id') ? 'has-error' : ''}}">
    <label for="guru_id" class="control-label">{{ ucwords('Guru Id') }}</label>

    <div class="col-md-12">

        <select name="guru_id" class="form-control form-control-line" id="guru_id" required>
            @foreach ($guru as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($mapel_detail->guru_id) && $mapel_detail->guru_id == $optionKey) || old('guru_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('guru_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('kelas_id') ? 'has-error' : ''}}">
    <label for="kelas_id" class="control-label">{{ ucwords('Kelas Id') }}</label>

    <div class="col-md-12">

        <select name="kelas_id" class="form-control form-control-line" id="kelas_id" required>
            @foreach ($kelas as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kelas_detail->kelas_id) && $kelas_detail->kelas_id == $optionKey) || old('kelas_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kelas_id')
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
