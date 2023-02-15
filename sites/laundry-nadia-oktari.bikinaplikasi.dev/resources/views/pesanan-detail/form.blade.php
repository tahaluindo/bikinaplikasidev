<div class="form-group {{ $errors->has('pesanan_id') ? 'has-error' : ''}}">
    <label for="pesanan_id" class="control-label">{{ 'Pesanan Id' }}</label>
    
    <div class="col-md-12">

        <select name="pesanan_id" class="form-control form-control-line" id="pesanan_id" required>
            @foreach (json_decode('{"$item->id":"$item->no"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pesanandetail->pesanan_id) && $pesanandetail->pesanan_id == $optionKey) || old('pesanan_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pesanan_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('paket_id') ? 'has-error' : ''}}">
    <label for="paket_id" class="control-label">{{ 'Paket Id' }}</label>
    
    <div class="col-md-12">

        <select name="paket_id" class="form-control form-control-line" id="paket_id" required>
            @foreach (json_decode('{"$item->id":"$item->nama"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pesanandetail->paket_id) && $pesanandetail->paket_id == $optionKey) || old('paket_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('paket_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>
    
<div class="col-md-12">
    <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror" name="jumlah" type="number" id="jumlah" value="{{ isset($pesanandetail->jumlah) ? $pesanandetail->jumlah : old('jumlah') }}" required>
    
    @error('jumlah')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    <label for="harga" class="control-label">{{ 'Harga' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga" class="form-control form-control-line @error('harga') is-invalid @enderror" name="harga" type="number" id="harga" value="{{ isset($pesanandetail->harga) ? $pesanandetail->harga : old('harga') }}" required>
    
    @error('harga')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    
<div class="col-md-12">
    <input placeholder="total" class="form-control form-control-line @error('total') is-invalid @enderror" name="total" type="number" id="total" value="{{ isset($pesanandetail->total) ? $pesanandetail->total : old('total') }}" required>
    
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
