<div class="form-group {{ $errors->has('paket_id') ? 'has-error' : ''}}">
    <label for="paket_id" class="control-label">{{ 'Paket Id' }}</label>

    <div class="col-md-12">

        <select name="paket_id" class="form-control form-control-line select2" id="paket_id" required>
            <option value="">--Pilih Paket--</option>
            @foreach ($paket as $item)
                <option
                    value="{{ $item->id }}" {{ (isset($pesanan->paket_id) && $pesanan->paket_id == $item->id) || old('paket_id') == $item->id ? 'selected' : ''}}>{{ $item->nama }} | min: {{ $item->minimal }} | harga: {{ toIdr($item->harga) }}</option>
            @endforeach
        </select>

        @error('paket_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('admin') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>

    <div class="col-md-12">
        <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" id="jumlah"
               value="{{ isset($pesanan->jumlah) ? $pesanan->jumlah : old('jumlah') }}" required step="0.01">

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('pelanggan_id') ? 'has-error' : ''}}">
    <label for="pelanggan_id" class="control-label">{{ 'Pelanggan Id' }}</label>

    <div class="col-md-12">

        <select name="pelanggan_id" class="form-control form-control-line select2" id="pelanggan_id">
            <option
                    value="">--Tidak Ada--</option>
            
            @foreach ($pelanggan as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pesanan->pelanggan_id) && $pesanan->pelanggan_id == $optionKey) || old('pelanggan_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pelanggan_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('dipesan_pada') ? 'has-error' : ''}}">
    <label for="dipesan_pada" class="control-label">{{ 'Dipesan Pada' }}</label>

    <div class="col-md-12">
        <input placeholder="dipesan_pada"
               class="form-control form-control-line @error('dipesan_pada') is-invalid @enderror" name="dipesan_pada"
               type="datetime-local" id="dipesan_pada"
               value="{{ isset($pesanan->dipesan_pada) ? $pesanan->dipesan_pada : (old('dipesan_pada') != "" ? old('dipesan_pada') : date('Y-m-d H:i:s') )}}"
               required>

        @error('dipesan_pada')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('diambil_pada') ? 'has-error' : ''}}">
    <label for="diambil_pada" class="control-label">{{ 'Diambil Pada' }}</label>

    <div class="col-md-12">
        <input placeholder="diambil_pada"
               class="form-control form-control-line @error('diambil_pada') is-invalid @enderror" name="diambil_pada"
               type="datetime-local" id="diambil_pada"
               value="{{ isset($pesanan->diambil_pada) ? $pesanan->diambil_pada : old('diambil_pada')}}" required step="any">

        @error('diambil_pada')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (json_decode('{"Belum Diproses":"Belum Diproses","Sedang Diproses":"Sedang Diproses","Selesai":"Selesai"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pesanan->status) && $pesanan->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('admin') ? 'has-error' : ''}}">
    <label for="admin" class="control-label">{{ 'Admin' }}</label>

    <div class="col-md-12">
        <input placeholder="admin" class="form-control form-control-line @error('admin') is-invalid @enderror"
               name="admin" type="number" id="admin"
               value="{{ isset($pesanan->admin) ? $pesanan->admin : (old('admin') != "" ? old('admin') : 0) }}" required @if(auth()->user()->level == 'Karyawan') readonly @endif>

        @error('admin')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('diskon') ? 'has-error' : ''}}">
    <label for="diskon" class="control-label">{{ 'Diskon (Dalam Rupiah)' }}</label>

    <div class="col-md-12">
        <input placeholder="diskon" class="form-control form-control-line @error('diskon') is-invalid @enderror"
               name="diskon" type="number" id="diskon"
               value="{{ isset($pesanan->diskon) ? $pesanan->diskon : (old('diskon') != "" ? old('diskon') : 0) }}" required  @if(auth()->user()->level == 'Karyawan') readonly @endif>

        @error('diskon')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">

    <div class="col-md-12">
        <button class="btn btn-success" type="submit" name="cetak_nota_tanpa_pelanggan" value="-">Cetak Nota Tanpa Pelanggan</button>
        <button class="btn btn-success" type="submit">Simpan & Cetak Nota</button>
        <strong><span id="pesanan-total">Rp0</span></strong>
    </div>
</div>

