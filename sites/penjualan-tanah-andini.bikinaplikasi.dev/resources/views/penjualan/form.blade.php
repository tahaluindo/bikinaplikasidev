<div class="form-group {{ $errors->has('pelanggan_id') ? 'has-error' : ''}}">
    <label for="pelanggan_id" class="control-label">{{ ucwords('Pelanggan Id') }}</label>

    <div class="col-md-12">

        <select name="pelanggan_id" class="form-control form-control-line" id="pelanggan_id" required>
            @foreach ($pelanggan as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($penjualan->pelanggan_id) && $penjualan->pelanggan_id == $optionKey) || old('pelanggan_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pelanggan_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('kavling_id') ? 'has-error' : ''}}">
    <label for="kavling_id" class="control-label">{{ ucwords('Kavling Id') }}</label>

    <div class="col-md-12">

        <select name="kavling_id" class="form-control form-control-line" id="kavling_id" required>
            @foreach ($kavling as $optionKey => $item)
                <option
                    value="{{ $item->id }}" {{ (isset($penjualan->kavling_id) && $penjualan->kavling_id == $item->id) || old('kavling_id') == $item->id ? 'selected' : ''}}>{{ $item->nomor_kavling }} (Harga: {{ toIdr($item->harga) }} | Angsuran: {{ toIdr($item->angsuran) }})</option>
            @endforeach
        </select>

        @error('kavling_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('cara_pembayaran') ? 'has-error' : ''}}">
    <label for="cara_pembayaran" class="control-label">{{ ucwords('Cara Pembayaran') }}</label>

    <div class="col-md-12">

        <select name="cara_pembayaran" class="form-control form-control-line" id="cara_pembayaran">
            @foreach (["Lunas"=>"Lunas","Angsuran"=>"Angsuran"] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($penjualan->cara_pembayaran) && $penjualan->cara_pembayaran == $optionKey) || old('cara_pembayaran') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('cara_pembayaran')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('lama_angsuran') ? 'has-error' : ''}}">
    <label for="lama_angsuran" class="control-label">{{ ucwords('Lama Angsuran (Bulan)') }}</label>
    <div class="col-md-12">
        <input placeholder="lama_angsuran"
               class="form-control form-control-line @error('lama_angsuran') is-invalid @enderror" name="lama_angsuran"
               type="number" id="lama_angsuran"
               value="{{ isset($penjualan->lama_angsuran) ? $penjualan->lama_angsuran : old('lama_angsuran') }}"
               required>

        @error('lama_angsuran')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('batas_pembayaran') ? 'has-error' : ''}}">
    <label for="batas_pembayaran" class="control-label">{{ ucwords('Batas Pembayaran') }}</label>
    <div class="col-md-12">
        <input placeholder="batas_pembayaran"
               class="form-control form-control-line @error('batas_pembayaran') is-invalid @enderror"
               name="batas_pembayaran" type="date" id="batas_pembayaran"
               value="{{ isset($penjualan->batas_pembayaran) ? $penjualan->batas_pembayaran : old('batas_pembayaran') }}">

        @error('batas_pembayaran')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('dp') ? 'has-error' : ''}}">
    <label for="dp" class="control-label">{{ ucwords('Dp') }}</label>
    <div class="col-md-12">
        <input placeholder="dp" class="form-control form-control-line @error('dp') is-invalid @enderror" name="dp"
               type="number" id="dp" value="{{ isset($penjualan->dp) ? $penjualan->dp : old('dp') }}" required>

        @error('dp')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('biaya_ppjb') ? 'has-error' : ''}}">
    <label for="biaya_ppjb" class="control-label">{{ ucwords('Biaya Ppjb') }}</label>
    <div class="col-md-12">
        <input placeholder="biaya_ppjb" class="form-control form-control-line @error('biaya_ppjb') is-invalid @enderror"
               name="biaya_ppjb" type="number" id="biaya_ppjb"
               value="{{ isset($penjualan->biaya_ppjb) ? $penjualan->biaya_ppjb : old('biaya_ppjb') }}" required>

        @error('biaya_ppjb')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('biaya_shm') ? 'has-error' : ''}}">
    <label for="biaya_shm" class="control-label">{{ ucwords('Biaya Shm') }}</label>
    <div class="col-md-12">
        <input placeholder="biaya_shm" class="form-control form-control-line @error('biaya_shm') is-invalid @enderror"
               name="biaya_shm" type="number" id="biaya_shm"
               value="{{ isset($penjualan->biaya_shm) ? $penjualan->biaya_shm : old('biaya_shm') }}" required>

        @error('biaya_shm')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ ucwords('Status') }}</label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="statusz" required>
            @foreach (['DP' => 'DP', 'Lunas' => 'Lunas', 'Belum Lunas' => 'Belum Lunas'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($penjualan->status) && $penjualan->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('catatan') ? 'has-error' : ''}}">
    <label for="catatan" class="control-label">{{ ucwords('Catatan') }}</label>

    <textarea class="form-control" rows="5" name="catatan" type="textarea" id="catatan"
              placeholder="catatan">{{ isset($penjualan->catatan) ? $penjualan->catatan : old('catatan')}}</textarea>

    @error('catatan')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
