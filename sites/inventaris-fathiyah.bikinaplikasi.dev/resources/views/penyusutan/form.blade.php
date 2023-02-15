<input type="hidden" name="barang_id" value="{{ request()->barang_id }}">

<div class="form-group {{ $errors->has('tahun_ke') ? 'has-error' : ''}}">
    <label for="tahun_ke" class="control-label">{{ 'Tahun ke' }}</label>

    <div class="col-md-12">
        <input placeholder="tahun_ke" class="form-control form-control-line @error('tahun_ke') is-invalid @enderror"
               name="tahun_ke" type="number" id="tahun_ke"
               value="{{ $tahun_ke }}" required readonly>

        @error('tahun_ke')
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
               value="{{ $jumlah }}" required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group">
    <div class="col-sm-12" style="margin-top: 15px;">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
