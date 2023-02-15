<div class="form-group {{ $errors->has('nama Pelanggan') ? 'has-error' : ''}}">
    <label for="nama_pelanggan" class="control-label">{{ 'Nama Pelanggan' }}</label>

    <div class="col-md-12">
        <input placeholder="nama_pelanggan"
               class="form-control form-control-line @error('nama_pelanggan') is-invalid @enderror"
               name="nama_pelanggan" type="text" id="nama_pelanggan"
               value="{{ isset($pemesanan->nama_pelanggan) ? $pemesanan->nama_pelanggan : old('nama_pelanggan') }}">

        @error('nama_pelanggan')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'No Meja' }}</label>

    <div class="col-md-12">

        <select name="meja_id" class="form-control form-control-line" id="meja_id" required>
            @foreach ($meja->pluck('no_meja', 'id') as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pemesanan->meja_id) && $pemesanan->meja_id == $optionKey) || old('meja_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('meja_id')
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
            @foreach (json_decode('{"pending":"pending","selesai":"selesai","cancel":"cancel"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pemesanan->status) && $pemesanan->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
    <label for="catatan" class="control-label">{{ 'Catatan' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="catatan" type="textarea" id="catatan"
                  placeholder="catatan">{{ isset($pemesanan->catatan) ? $pemesanan->catatan : old('catatan')}}</textarea>

        @error('catatan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Pilih barang >></button>
    </div>
</div>
