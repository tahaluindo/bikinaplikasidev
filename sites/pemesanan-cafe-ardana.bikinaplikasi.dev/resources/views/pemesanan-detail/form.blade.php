<input type="hidden" name="pemesanan_id" value="{{ request()->pemesanan_id ?? $pemesanan_detail->pemesanan_id }}">

<div class="form-group {{ $errors->has('produk_id') ? 'has-error' : ''}}">
    <label for="produk_id" class="control-label">{{ 'Produk Id' }}</label>

    <div class="col-md-12">

        <select name="produk_id" class="form-control form-control-line" id="produk_id" required>
            <option value="">-- Pilih Produk --</option>
            @foreach (json_decode(request()->produk) ?? $produk as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pemesanan_detail->produk_id) && $pemesanan_detail->produk_id == $optionKey) || old('produk_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('produk_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    <label for="harga" class="control-label">{{ 'Harga' }}</label>

    <div class="col-md-12">
        <input placeholder="harga" class="form-control form-control-line @error('harga') is-invalid @enderror"
               name="harga" type="number" id="harga_jual"
               value="{{ isset($pemesanan_detail->harga) ? $pemesanan_detail->harga : old('harga') }}" required>

        @error('harga')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>

    <div class="col-md-12">
        <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" id="jumlah"
               value="{{ isset($pemesanan_detail->jumlah) ? $pemesanan_detail->jumlah : old('jumlah') }}" required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>

    <div class="col-md-12">
        <input placeholder="total" class="form-control form-control-line @error('total') is-invalid @enderror"
               name="total" type="number" id="total"
               value="{{ isset($pemesanan_detail->total) ? $pemesanan_detail->total : old('total') }}" required readonly>

        @error('total')
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
