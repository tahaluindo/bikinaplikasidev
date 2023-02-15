<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
            type="text" id="nama" value="{{ isset($kriteria->nama) ? $kriteria->nama : old('nama')}}" required>

        @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('nilai') ? 'has-error' : ''}}">
    <label for="nilai" class="control-label">{{ 'nilai' }}</label>

    <div class="col-md-12">
        <input placeholder="nilai" class="form-control form-control-line @error('nilai') is-invalid @enderror" name="nilai"
            type="text" id="nilai" value="{{ isset($kriteria->nilai) ? $kriteria->nilai : old('nilai')}}" required>

        @error('nilai')
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
