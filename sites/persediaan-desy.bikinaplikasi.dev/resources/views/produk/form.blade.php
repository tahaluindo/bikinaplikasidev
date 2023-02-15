<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($produk->nama) ? $produk->nama : old('nama') }}">

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('expire_at') ? 'has-error' : ''}}">
    <label for="expire_at" class="control-label">{{ 'Expire At' }}</label>

    <div class="col-md-12">
        <input placeholder="expire_at" class="form-control form-control-line @error('expire_at') is-invalid @enderror"
               name="expire_at" type="date" id="expire_at"
               value="{{ isset($produk->expire_at) ? $produk->expire_at : old('expire_at') }}" required>

        @error('expire_at')
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
               value="{{ isset($produk->harga_beli) ? $produk->harga_beli : old('harga_beli') }}" required>

        @error('harga_beli')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('harga_jual') ? 'has-error' : ''}}">
    <label for="harga_jual" class="control-label">{{ 'Harga Jual' }}</label>

    <div class="col-md-12">
        <input placeholder="harga_jual" class="form-control form-control-line @error('harga_jual') is-invalid @enderror"
               name="harga_jual" type="number" id="harga_jual"
               value="{{ isset($produk->harga_jual) ? $produk->harga_jual : old('harga_jual') }}" required>

        @error('harga_jual')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>



<div class="form-group {{ $errors->has('stok') ? 'has-error' : ''}}">
    <label for="stok" class="control-label">{{ 'Stok' }}</label>

    <div class="col-md-12">
        <input placeholder="stok" class="form-control form-control-line @error('stok') is-invalid @enderror" name="stok"
               type="number" id="stok" value="{{ isset($produk->stok) ? $produk->stok : old('stok') }}" required>

        @error('stok')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('satuan') ? 'has-error' : ''}}">
    <label for="satuan" class="control-label">{{ 'Satuan   ' }}</label>

    <div class="col-md-12">
        <select name="satuan" class="form-control form-control-line" id="satuan" required>
            @foreach (['Kg' => 'Kg', 'Karung' => 'Karung', 'Pcs' => 'Pcs'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($penjualan->satuan) && $penjualan->satuan == $optionKey) || old('satuan') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('satuan')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'Gambar' }}</label>

    <div class="col-md-12">
        <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
               name="gambar" type="file" id="gambar"
               value="{{ isset($produk->gambar) ? $produk->gambar : old('gambar') }}">

        @error('gambar')
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
