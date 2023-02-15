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

<div class="form-group {{ $errors->has('urutan_prioritas') ? 'has-error' : ''}}">
    <label for="urutan_prioritas" class="control-label">{{ 'Urutan Prioritas' }}</label>

    <div class="col-md-12">
        <input placeholder="urutan_prioritas" class="form-control form-control-line @error('urutan_prioritas') is-invalid @enderror" name="urutan_prioritas"
            type="text" id="urutan_prioritas" value="{{ isset($kriteria->urutan_prioritas) ? $kriteria->urutan_prioritas : old('urutan_prioritas')}}" required>

        @error('urutan_prioritas')
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
