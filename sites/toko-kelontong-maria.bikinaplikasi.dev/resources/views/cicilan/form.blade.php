<div class="form-group {{ $errors->has('tagihan_id') ? 'has-error' : ''}}">
    <label for="tagihan_id" class="control-label">{{ ucwords('Tagihan Id') }}</label>
    <div class="col-md-12">
        <input placeholder="tagihan_id" class="form-control form-control-line @error('tagihan_id') is-invalid @enderror"
               name="tagihan_id" type="number" id="tagihan_id"
               value="{{ isset($cicilan->tagihan_id) ? $cicilan->tagihan_id : old('tagihan_id') }}" required>

        @error('tagihan_id')
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
               value="{{ isset($cicilan->jumlah) ? $cicilan->jumlah : old('jumlah') }}" required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('cicilan_ke') ? 'has-error' : ''}}">
    <label for="cicilan_ke" class="control-label">{{ ucwords('Cicilan Ke') }}</label>
    <div class="col-md-12">
        <input placeholder="cicilan_ke" class="form-control form-control-line @error('cicilan_ke') is-invalid @enderror"
               name="cicilan_ke" type="number" id="cicilan_ke"
               value="{{ isset($cicilan->cicilan_ke) ? $cicilan->cicilan_ke : old('cicilan_ke') }}" required>

        @error('cicilan_ke')
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
