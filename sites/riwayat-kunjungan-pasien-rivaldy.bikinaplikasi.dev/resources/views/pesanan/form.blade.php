<div class="form-group {{ $errors->has('penjual_id') ? 'has-error' : ''}}">
    <label for="penjual_id" class="control-label">{{ 'Penjual Id' }}</label>
    
    <div class="col-md-12">

        <select name="penjual_id" class="form-control form-control-line" id="penjual_id" required>
            @foreach (json_decode('[{"$penjual->id":"$penjual->nama"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pesanan->penjual_id) && $pesanan->penjual_id == $optionKey) || old('penjual_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('penjual_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('meja_id') ? 'has-error' : ''}}">
    <label for="meja_id" class="control-label">{{ 'Meja Id' }}</label>
    
    <div class="col-md-12">

        <select name="meja_id" class="form-control form-control-line" id="meja_id" required>
            @foreach (json_decode('[{"$meja->id":"$meja->nama"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pesanan->meja_id) && $pesanan->meja_id == $optionKey) || old('meja_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('meja_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('atas_nama') ? 'has-error' : ''}}">
    <label for="atas_nama" class="control-label">{{ 'Atas Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="atas_nama" class="form-control form-control-line @error('atas_nama') is-invalid @enderror" name="atas_nama" type="text" id="atas_nama" value="{{ isset($pesanan->atas_nama) ? $pesanan->atas_nama : old('atas_nama') }}" required>
    
    @error('atas_nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    
    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" >
            @foreach (json_decode('[{"Belum Diproses":"Belum Diproses","Dibatalkan":"Dibatalkan","Diproses":"Diproses","Dibayar":"Dibayar"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($pesanan->status) && $pesanan->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
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
