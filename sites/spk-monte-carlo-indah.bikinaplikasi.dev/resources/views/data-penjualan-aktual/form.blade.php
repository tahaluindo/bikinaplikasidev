<div class="form-group {{ $errors->has('produk_id') ? 'has-error' : ''}}">
    <label for="produk_id" class="control-label">{{ 'Produk Id' }}</label>
    
    <div class="col-md-12">

        <select name="produk_id" class="form-control form-control-line" id="produk_id" >
            @foreach (json_decode('[{"$produk->id":"$produk->nama"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($datapenjualanaktual->produk_id) && $datapenjualanaktual->produk_id == $optionKey) || old('produk_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
            @foreach (json_decode('[{"$tahun->id":"$tahun->nama"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($datapenjualanaktual->tahun_id) && $datapenjualanaktual->tahun_id == $optionKey) || old('tahun_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
