

<input type="hidden" name="penjualan_id" value="{{ request()->penjualan_id ?? $penjualan_detail->penjualan_id }}">

<div class="form-group {{ $errors->has('barang_id') ? 'has-error' : ''}}">
    <label for="barang_id" class="control-label">{{ 'Barang Id' }}</label>

    <div class="col-md-12">

        <select name="barang_id" class="form-control form-control-line" id="barang_id" required>
            @foreach (json_decode(request()->barang) ?? $barang as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($penjualan_detail->barang_id) && $penjualan_detail->barang_id == $optionKey) || old('barang_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('barang_id')
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
               value="{{ isset($penjualan_detail->harga) ? $penjualan_detail->harga : old('harga') }}" required readonly>

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
               value="{{ isset($penjualan_detail->jumlah) ? $penjualan_detail->jumlah : old('jumlah') }}" required>

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
               value="{{ isset($penjualan_detail->total) ? $penjualan_detail->total : old('total') }}" required readonly>

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
