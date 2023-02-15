<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ ucwords('Tanggal') }}</label>
    <div class="col-md-12">
        <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror"
               name="tanggal" type="date" id="tanggal"
               value="{{ isset($produk_detail->tanggal) ? \Carbon\Carbon::parse($produk_detail->tanggal)->toDateString() : old('tanggal') }}" required>

        @error('tanggal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ ucwords('Jumlah') }}</label>
    <div class="col-md-12">
        <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" id="jumlah"
               value="{{ isset($produk_detail->jumlah) ? $produk_detail->jumlah : old('jumlah') }}" required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('harga_beli') ? 'has-error' : ''}}">
    <label for="harga_beli" class="control-label">{{ ucwords('Harga Beli') }}</label>
    <div class="col-md-12">
        <input placeholder="harga_beli" class="form-control form-control-line @error('harga_beli') is-invalid @enderror"
               name="harga_beli" type="number" id="harga_beli"
               value="{{ isset($produk_detail->harga_beli) ? $produk_detail->harga_beli : old('harga_beli') }}"
               required>

        @error('harga_beli')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('harga_jual') ? 'has-error' : ''}}">
    <label for="harga_jual" class="control-label">{{ ucwords('Harga Jual') }}</label>
    <div class="col-md-12">
        <input placeholder="harga_jual" class="form-control form-control-line @error('harga_jual') is-invalid @enderror"
               name="harga_jual" type="number" id="harga_jual"
               value="{{ isset($produk_detail->harga_jual) ? $produk_detail->harga_jual : old('harga_jual') }}"
               required>

        @error('harga_jual')
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