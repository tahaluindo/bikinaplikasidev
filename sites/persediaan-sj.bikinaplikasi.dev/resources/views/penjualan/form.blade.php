<div class="form-group {{ $errors->has('pelanggan_id') ? 'has-error' : ''}}">
    <label for="pelanggan_id" class="control-label">{{ 'Pelanggan Id' }}</label>

    <a type="button" class="badge badge-primary" href="{{ route('pelanggan.create') }}">
        <i class="fa fa-plus"></i>
    </a>

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
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (json_decode('{"pending":"pending","selesai":"selesai","cancel":"cancel"}', true) as $optionKey => $optionValue)
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
    <label for="catatan" class="control-label">{{ 'Catatan' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="catatan" type="textarea" id="catatan"
                  placeholder="catatan">{{ isset($penjualan->catatan) ? $penjualan->catatan : old('catatan')}}</textarea>

        @error('catatan')
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
