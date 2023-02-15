<div class="form-group {{ $errors->has('atas_nama') ? 'has-error' : '' }}">
    <label for="atas nama" class="control-label">{{ ucwords('Atas Nama') }}</label>
    <div class="col-md-12">
        <input type="text" class="form-control form-control-line @error('nama') is-invalid @enderror"
            placeholder="Atas Nama" name="atas_nama"
            value="{{ old('atas_nama') == '' && isset($pemesanan) ? $pemesanan->atas_nama : old('atas_nama') }}">

        @error('atas_nama')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
</div>

<div class="form-group {{ $errors->has('lapangan') ? 'has-error' : '' }}">
    <label for="lapangan" class="control-label">{{ ucwords('lapangan') }}</label>
    <div class="col-md-12">
        <select name='lapangan_id' class="form-control form-control-line @error('nama') is-invalid @enderror">
            <option value="">-- Pilih Lapangan Yang Tersedia --</option>
            @foreach ($lapangan as $item)
                <option value="{{ $item->id }}" {{ $item->id == (isset($pemesanan) ?  $pemesanan->lapangan_id : "")  ? 'selected' : '' }}>
                    {{ $item->nama }}</option>
            @endforeach
        </select>
        @error('lapangan_id')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('atas_nama') ? 'has-error' : '' }}">
    <label for="atas_nama" class="control-label">{{ ucwords('Waktu Mulai') }}</label>
    <div class="col-md-12">
        <input type="datetime-local" placeholder="Waktu Mulai" name="waktu_mulai"
            value="{{ old('waktu_mulai') == ''  && isset($pemesanan) ? $pemesanan->waktu_mulai : old('waktu_mulai') }}"
            class="form-control form-control-line @error('nama') is-invalid @enderror">
        <div style="color: white !important;">Waktu Mulai</div>
        @error('waktu_mulai')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jumlah_jam') ? 'has-error' : '' }}">
    <label for="jumlah_jam" class="control-label">{{ ucwords('Jumlah Jam') }}</label>
    <div class="col-md-12">
        <input type="number" placeholder="Jumlah jam" name="jumlah_jam" min="0" max="6"
            value="{{ old('jumlah_jam') == ''  && isset($pemesanan) ? $pemesanan->jumlah_jam : old('jumlah_jam') }}"
            class="form-control form-control-line @error('nama') is-invalid @enderror">
        <div style="color: white !important;">Jumlah jam</div>
        @error('jumlah_jam')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('catatan') ? 'has-error' : '' }}">
    <label for="catatan" class="control-label">{{ ucwords('Catatan') }}</label>
    <div class="col-md-12">
        <textarea placeholder="Catatan" rows="5" id="catatan" name="catatan"
            class="form-control form-control-line @error('nama') is-invalid @enderror">{{ old('catatan') == ''  && isset($pemesanan) ? $pemesanan->catatan : old('catatan') }}</textarea>
        @error('catatan')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('metode pembayaran') ? 'has-error' : '' }}">
    <label for="metode pembayaran" class="control-label">{{ ucwords('metode pembayaran') }}</label>
    <div class="col-md-12">
        <select name='metode_pembayaran' class="form-control form-control-line @error('metode pembayaran') is-invalid @enderror">
            <option value="">-- Pilih Metode Pembayaran Yang Tersedia --</option>
            @foreach (['COD', 'Transfer'] as $item)
                <option value="{{ $item }}" {{ $item == (isset($pemesanan) ?  $pemesanan->metode_pembayaran : "") ? 'selected' : '' }}>
                    {{ $item }}</option>
            @endforeach
        </select>
        @error('metode_pembayaran')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
    <label for="No Hp" class="control-label">{{ ucwords('No Hp') }}</label>
    <div class="col-md-12">
        <input type="text" class="form-control form-control-line @error('nama') is-invalid @enderror"
            placeholder="No Hp" name="no_hp"
            value="{{ old('no_hp') == ''  && isset($pemesanan) ? $pemesanan->no_hp : old('no_hp') }}">

        @error('no_hp')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
</div>

<div class="form-group {{ $errors->has('bukti_transfer') ? 'has-error' : '' }}">
    <label for="bukti transfer" class="control-label">{{ ucwords('Bukti transfer') }}</label>
    <div class="col-md-12">
        <input type="file" class="form-control form-control-line @error('bukti_transfer') is-invalid @enderror"
            placeholder="Bukti transfer" name="bukti_transfer"
            value="{{ old('bukti_transfer') == '' && isset($pemesanan) ? $pemesanan->bukti_transfer : old('bukti_transfer') }}">

        @error('bukti_transfer')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
</div>