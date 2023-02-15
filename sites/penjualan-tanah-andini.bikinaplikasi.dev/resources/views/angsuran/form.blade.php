<input type="hidden" name="penjualan_id" value="{{ request()->penjualan_id }}">

@if(isset($angsuran))
    <div class="form-group {{ $errors->has('angsuran_ke') ? 'has-error' : ''}}">
        <label for="angsuran_ke" class="control-label">{{ ucwords('Angsuran Ke') }}</label>
        <div class="col-md-12">
            <input placeholder="angsuran_ke"
                   class="form-control form-control-line @error('angsuran_ke') is-invalid @enderror" name="angsuran_ke"
                   type="number" id="angsuran_ke"
                   value="{{ isset($angsuran->angsuran_ke) ? $angsuran->angsuran_ke : (old('angsuran_ke') != "" ? old('angsuran_ke'): $angsuran_terakhir->angsuran_ke + 1 ) }}"
                   required>

            @error('angsuran_ke')
            <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>

    </div>
@else
    <div class="form-group {{ $errors->has('angsuran_ke') ? 'has-error' : ''}}">
        <label for="angsuran_ke" class="control-label">{{ ucwords('Angsuran Ke') }}</label>
        <div class="col-md-12">
            <input placeholder="angsuran_ke"
                   class="form-control form-control-line @error('angsuran_ke') is-invalid @enderror" name="angsuran_ke"
                   type="number" id="angsuran_ke"
                   value="{{ old('angsuran_ke') != "" ? old('angsuran_ke') :  + 1 }}"
                   required>

            @error('angsuran_ke')
            <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>

    </div>
@endif

<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ ucwords('Jumlah') }}</label>
    <div class="col-md-12">
        <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" id="jumlah"
               value="{{ isset($angsuran->jumlah) ? $angsuran->jumlah : (old('jumlah') != "" ? old('jumlah'): $kavling->angsuran ) }}"
               required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ ucwords('Tanggal') }}</label>
    <div class="col-md-12">
        <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror"
               name="tanggal" type="date" id="tanggal"
               value="{{ isset($angsuran->tanggal) ? $angsuran->tanggal : (old('tanggal') != "" ? old('tanggal'): date('Y-m-d') ) }}"
               required>

        @error('tanggal')
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
