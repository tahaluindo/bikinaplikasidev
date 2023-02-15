<input type="hidden" name="kriteria_id" value="{{ request()->kriteria_id }}">

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Keterangan' }}</label>

    <div class="col-md-12">
        <input placeholder="keterangan" class="form-control form-control-line @error('keterangan') is-invalid @enderror" name="keterangan"
            type="text" id="keterangan" value="{{ isset($kriteria_detail->keterangan) ? $kriteria_detail->keterangan : old('keterangan')}}" required>

        @error('keterangan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('nilai_bobot') ? 'has-error' : ''}}">
    <label for="nilai_bobot" class="control-label">{{ 'nilai bobot' }}</label>

    <div class="col-md-12">
        <input placeholder="nilai_bobot" class="form-control form-control-line @error('nilai_bobot') is-invalid @enderror" name="nilai_bobot"
            type="text" id="nilai_bobot" value="{{ isset($kriteria_detail->nilai_bobot) ? $kriteria_detail->nilai_bobot : old('nilai_bobot')}}" required>

        @error('nilai_bobot')
        <span class="invalid-feedback" role="alert">
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
