<input type="hidden" name="pembayaran_id" value="{{ request()->pembayaran_id }}">

<div class="form-group {{ $errors->has('siswa_id') ? 'has-error' : ''}}">
    <label for="siswa_id" class="control-label">{{ ucwords('Siswa Id') }}</label>

    <div class="col-md-12">

        <select name="siswa_id" class="form-control form-control-line" id="siswa_id" required>
            @foreach ($siswa as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pembayarandetail->siswa_id) && $pembayarandetail->siswa_id == $optionKey) || old('siswa_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('siswa_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ ucwords('Jumlah') }}</label>
    <div class="col-md-12">
        <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" id="jumlah"
               value="{{ isset($pembayarandetail->jumlah) ? $pembayarandetail->jumlah : old('jumlah') }}" required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('catatan') ? 'has-error' : ''}}">
    <label for="catatan" class="control-label">{{ ucwords('Keterangan') }}</label>
    <div class="col-md-12">
        <input placeholder="catatan" class="form-control form-control-line @error('catatan') is-invalid @enderror"
               name="catatan" type="text" id="catatan"
               value="{{ isset($pembayarandetail->catatan) ? $pembayarandetail->catatan : old('catatan') }}">

        @error('catatan')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    Mohon transfer ke rekening:<br>
    NO.REK 1025953807 BANK BSI A/N MERI SOLPIAH</br>

    <label for="gambar" class="control-label">{{ 'Gambar' }}</label>

    <div class="col-md-12">
        <input placeholder="gambar"
               class="form-control form-control-line @error('gambar') is-invalid @enderror"
               name="gambar" type="file" id="gambar"
               value="{{ isset($pembayarandetail->gambar) ? $pembayarandetail->gambar : old('gambar') }}">

        @error('gambar')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


@if(auth()->user()->level == 'Admin')
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ ucwords('Status') }}</label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (['Diterima', 'Ditolak', 'Menunggu Konfirmasi'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionValue }}" {{ (isset($pembayarandetail->status) && $pembayarandetail->status == $optionValue) || old('status') == $optionValue ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
@endif

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
