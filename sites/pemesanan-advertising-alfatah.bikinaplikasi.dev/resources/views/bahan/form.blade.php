<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($bahan->nama) ? $bahan->nama : old('nama') }}">

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('harga_beli') ? 'has-error' : ''}}">
    <label for="harga_beli" class="control-label">{{ 'Harga Beli' }}</label>

    <div class="col-md-12">
        <input placeholder="harga_beli" class="form-control form-control-line @error('harga_beli') is-invalid @enderror"
               name="harga_beli" type="number" id="harga_beli"
               value="{{ isset($bahan->harga_beli) ? $bahan->harga_beli : old('harga_beli') }}" required>

        @error('harga_beli')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('stok') ? 'has-error' : ''}}">
    <label for="stok" class="control-label">{{ 'Stok' }}</label>

    <div class="col-md-12">
        <input placeholder="stok" class="form-control form-control-line @error('stok') is-invalid @enderror"
               name="stok" type="number" id="stok"
               value="{{ isset($bahan->stok) ? $bahan->stok : old('stok') }}" required>

        @error('stok')
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
