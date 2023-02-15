<div class="form-group {{ $errors->has('pemasok_id') ? 'has-error' : ''}}">
    <label for="pemasok_id" class="control-label">{{ 'Pemasok Id' }}</label>
    <a type="button" class="badge badge-primary" href="{{ route('pemasok.create') }}">
        <i class="fa fa-plus"></i>
    </a>
    <div class="col-md-12">

        <select name="pemasok_id" class="form-control form-control-line" id="pemasok_id" required>
            @foreach ($pemasok as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pembelian->pemasok_id) && $pembelian->pemasok_id == $optionKey) || old('pemasok_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pemasok_id')
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
            @foreach (json_decode('{"pending":"pending","selesai":"selesai","cancel":"cancel","refund":"refund"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pembelian->status) && $pembelian->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
                  placeholder="catatan">{{ isset($pembelian->catatan) ? $pembelian->catatan : old('catatan')}}</textarea>

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
