
<div class="form-group {{ $errors->has('kode') ? 'has-error' : ''}}">
    <label for="kode" class="control-label">{{ 'Kode' }}</label>

    <div class="col-md-12">
        <input placeholder="kode" class="form-control form-control-line @error('kode') is-invalid @enderror" name="kode"
            type="text" id="kode" value="{{ isset($comunale->kode) ? $comunale->kode : old('kode')}}" required>

        @error('kode')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
            type="text" id="nama" value="{{ isset($comunale->nama) ? $comunale->nama : old('nama')}}" required>

        @error('nama')
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
