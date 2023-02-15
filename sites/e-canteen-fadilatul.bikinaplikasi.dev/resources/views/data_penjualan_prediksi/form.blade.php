<div class="form-group {{ $errors->has('produk_id') ? 'has-error' : ''}}">
    <label for="produk_id" class="control-label">{{ 'Produk Id' }}</label>
    
    <div class="col-md-12">

        <select name="produk_id" class="form-control form-control-line" id="produk_id" >
            @foreach ($produks as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($data_penjualan_prediksi->produk_id) && $data_penjualan_prediksi->produk_id == $optionKey) || old('produk_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('produk_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('tahun_id') ? 'has-error' : ''}}">
    <label for="tahun_id" class="control-label">{{ 'Tahun Id' }}</label>
    
    <div class="col-md-12">

        <select name="tahun_id" class="form-control form-control-line" id="tahun_id" >
            @foreach ($tahuns as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($data_penjualan_prediksi->tahun_id) && $data_penjualan_prediksi->tahun_id == $optionKey) || old('tahun_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('tahun_id')
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
