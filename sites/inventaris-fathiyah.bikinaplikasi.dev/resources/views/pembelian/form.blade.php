

<div class="form-group {{ $errors->has('barang_id') ? 'has-error' : ''}}">
    <label for="barang_id" class="control-label">{{ 'Barang Id' }}</label>

    <div class="col-md-12">

        <select name="barang_id" class="form-control form-control-line" id="barang_id" required>
            @foreach ($barang as $optionKey => $item)
                <option
                    value="{{ $item->id }}" {{ (isset($pembelian->barang_id) && $pembelian->barang_id == $item->barang_id) || old('barang_id') == $item->barang_id ? 'selected' : ''}}>{{ $item->nama }} (Harga Per Unit: {{ toIdr($item->harga_per_unit) }}, Jumlah: {{ $item->jumlah }})</option>
            @endforeach
        </select>

        @error('barang_id')
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
               value="{{ isset($pembelian->jumlah) ? $pembelian->jumlah : (old('jumlah') == "" ? 1 : old('jumlah')) }}" required min="1">

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'Tanggal' }}</label>

    <div class="col-md-12">
        <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror"
               name="tanggal" type="date" id="tanggal"
               value="{{ isset($pembelian->tanggal) ? $pembelian->tanggal : (old('tanggal') == "" ? date('Y-m-d') : old('tanggal')) }}" required>

        @error('tanggal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group">
    <label for="tanggal" class="control-label">{{ '' }}</label>
    <div class="col-sm-12" style="margin-top: 15px;">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
