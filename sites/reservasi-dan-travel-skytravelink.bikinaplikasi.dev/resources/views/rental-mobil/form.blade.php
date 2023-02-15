<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" name="user_id" value="{{ isset($rental_mobil->user_id) ? $rental_mobil->user_id : old('user_id') }}">

        <datalist id="user_id">
            <option value=""></option>
            @foreach ($users as $user)
                <option
                    value="{{ $user->id }}" {{ (isset($rental_mobil->user_id) && $rental_mobil->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''}}>{{ "$user->name" }}</option>
            @endforeach
        </datalist>

        @error('user_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('mobil_id') ? 'has-error' : ''}}">
    <label for="mobil_id" class="control-label">{{ 'Mobil Id' }}</label>

    <div class="col-md-12">

        <input list="mobil_id" class="form-control form-control-line mobil_id" required name="mobil_id" value="{{ isset($rental_mobil->mobil_id) ? $rental_mobil->mobil_id : old('mobil_id') }}">

        <datalist id="mobil_id">
            @foreach ($mobils as $mobil)
                <option
                    value="{{ $mobil->id }}" {{ (isset($rental_mobil->mobil_id) && $rental_mobil->mobil_id == $mobil->id) || old('mobil_id') == $mobil->id ? 'selected' : ''}}>{{ $mobil->nama }}, Biaya rental: {{ toIdr($mobil->biaya_rental) }}, Biaya supir: {{ toIdr($mobil->biaya_supir) }}</option>
            @endforeach
        </datalist>

        @error('mobil_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('supir_id') ? 'has-error' : ''}}">
    <label for="supir_id" class="control-label">{{ 'Supir Id' }}</label>

    <div class="col-md-12">

        <input list="supir_id" class="form-control form-control-line supir_id" required name="supir_id" value="{{ isset($rental_mobil->supir_id) ? $rental_mobil->supir_id : old('supir_id') }}">

        <datalist id="supir_id">
            <option value=""></option>
            @foreach ($supirs as $supir)
                <option
                    value="{{ $supir->id }}" {{ (isset($rental_supir->supir_id) && $rental_supir->supir_id == $supir->id) || old('supir_id') == $supir->id ? 'selected' : ''}}>{{ $supir->name }}</option>
            @endforeach
        </datalist>

        @error('supir_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('dari_tanggal') ? 'has-error' : ''}}">
    <label for="dari_tanggal" class="control-label">{{ 'Dari Tanggal' }}</label>

    <div class="col-md-12">
        <input placeholder="dari_tanggal"
               class="dari_tanggal flatpickr form-control form-control-line @error('dari_tanggal') is-invalid @enderror"
               name="dari_tanggal" type="text" id="dari_tanggal"
               value="{{ isset($rental_mobil->dari_tanggal) ? $rental_mobil->dari_tanggal : (old('dari_tanggal') == "" ? now()->format('d-M-Y') : old('dari_tanggal')) }}"
               required>

        @error('dari_tanggal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('sampai_tanggal') ? 'has-error' : ''}}">
    <label for="sampai_tanggal" class="sampai_tanggal control-label">{{ 'Sampai Tanggal' }}</label>

    <div class="col-md-12">
        <input placeholder="sampai_tanggal"
               class="sampai_tanggal flatpickr form-control form-control-line @error('sampai_tanggal') is-invalid @enderror"
               name="sampai_tanggal" type="text" id="sampai_tanggal"
               value="{{ isset($rental_mobil->sampai_tanggal) ? $rental_mobil->sampai_tanggal : (old('sampai_tanggal') == "" ? now()->addDays(env('APP_WAKTU_PERPANJANGAN'))->format('d-M-Y') : old('sampai_tanggal')) }}"
               required>

        @error('sampai_tanggal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('total_bayar') ? 'has-error' : ''}}">
    <label for="total_bayar" class="control-label">{{ 'Total Bayar' }}</label>

    <div class="col-md-12">
        <input placeholder="total_bayar"
               class="form-control form-control-line @error('total_bayar') is-invalid @enderror"
               name="total_bayar" type="number" min="1" id="total_bayar"
               value="{{ isset($rental_mobil->total_bayar) ? $rental_mobil->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar')) }}"
               required readonly>

        @error('total_bayar')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('bukti_transfer') ? 'has-error' : ''}}">
    <label for="bukti_transfer" class="control-label">{{ 'Bukti Transfer' }}</label>

    <div class="col-md-12">
        <input placeholder="bukti_transfer"
               class="form-control form-control-line @error('bukti_transfer') is-invalid @enderror"
               name="bukti_transfer" type="file" min="1" id="bukti_transfer"
               value="{{ isset($rental_mobil->bukti_transfer) ? $rental_mobil->bukti_transfer : old('bukti_transfer') }}">

        @error('bukti_transfer')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('refund') ? 'has-error' : ''}}">
    <label for="refund" class="control-label">{{ 'Refund' }}</label>

    <div class="col-md-12">
        <input placeholder="refund"
               class="form-control form-control-line @error('refund') is-invalid @enderror"
               name="refund" type="number" min="1" id="refund"
               value="{{ isset($rental_mobil->refund) ? $rental_mobil->refund : (old('refund') == "" ? 0 : old('refund')) }}"
               required readonly>

        @error('refund')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <input list="status" class="form-control form-control-line status" required name="status" value="{{ isset($rental_mobil->status) ? $rental_mobil->status : old('status') }}">

        <datalist id="status">
            <option value=""></option>
            @foreach (['Baru','Dikonfirmasi','Dibatalkan','Refund'] as $optionValue)
                <option
                    value="{{ $optionValue }}" {{ (isset($rental_mobil->status) && $rental_mobil->status == $optionValue) || old('status') == $optionValue ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </datalist>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


