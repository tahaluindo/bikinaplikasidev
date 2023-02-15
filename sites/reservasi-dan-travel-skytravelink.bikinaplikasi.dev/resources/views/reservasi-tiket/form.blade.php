<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" name="user_id" value="{{ isset($reservasi_tiket->user_id) ? $reservasi_tiket->user_id : old('user_id') }}">

        <datalist id="user_id">
            <option value=""></option>
            @foreach ($users as $user)
                <option
                    value="{{ $user->id }}" {{ (isset($reservasi_tiket->user_id) && $reservasi_tiket->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''}}>{{ "$user->name" }}</option>
            @endforeach
        </datalist>

        @error('user_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('tiket_id') ? 'has-error' : ''}}">
    <label for="tiket_id" class="control-label">{{ 'Tiket Id' }}</label>

    <div class="col-md-12">

        <input list="tiket_id" class="form-control form-control-line tiket_id" required name="tiket_id" value="{{ isset($reservasi_tiket->tiket_id) ? $reservasi_tiket->tiket_id : old('tiket_id') }}">

        <datalist id="tiket_id">
            @foreach ($tikets as $tiket)
                <option
                    value="{{ $tiket->id }}" {{ (isset($reservasi_tiket->tiket_id) && $reservasi_tiket->tiket_id == $tiket->id) || old('tiket_id') == $tiket->id ? 'selected' : ''}}>{{ $tiket->nama }} - {{ toIdr($tiket->rute->biaya) }}</option>
            @endforeach
        </datalist>

        @error('tiket_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>

    <div class="col-md-12">
        <input placeholder="jumlah" class="jumlah form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" min="1" id="jumlah"
               value="{{ isset($reservasi_tiket->jumlah) ? $reservasi_tiket->jumlah : old('jumlah') }}"
               required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('berakhir_pada') ? 'has-error' : ''}}">
    <label for="berakhir_pada" class="control-label">{{ 'Berakhir Pada' }}</label>

    <div class="col-md-12">
        <input placeholder="berakhir_pada"
               class="flatpickr form-control form-control-line @error('berakhir_pada') is-invalid @enderror"
               name="berakhir_pada" type="text" id="berakhir_pada"
               value="{{ isset($reservasi_tiket->berakhir_pada) ? $reservasi_tiket->berakhir_pada : (old('berakhir_pada') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('d-M-Y') : old('berakhir_pada')) }}"
               required>

        @error('berakhir_pada')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('biaya_transfer') ? 'has-error' : ''}}">
    <label for="bukti_transfer" class="control-label">{{ 'Bukti Transfer' }}</label>

    <div class="col-md-12">
        <input placeholder="bukti_transfer"
               class="form-control form-control-line @error('bukti_transfer') is-invalid @enderror"
               name="bukti_transfer" type="file" min="1" id="bukti_transfer">

        @error('bukti_transfer')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('pulang_pergi') ? 'has-error' : ''}}">
    <label for="pulang_pergi" class="control-label">{{ 'Pulang Pergi' }}</label>

    <div class="col-md-12">

        <select name="pulang_pergi" class="form-control form-control-line pulang_pergi" id="pulang_pergi" required>
            @foreach (['Ya' => 'Ya', 'Tidak' => 'Tidak'] as $pulang_pergi)
                <option
                    value="{{ $pulang_pergi }}" {{ (isset($reservasi_tiket->pulang_pergi) && $reservasi_tiket->pulang_pergi == $pulang_pergi) || old('pulang_pergi') == $pulang_pergi  ? 'selected' : ''}}>{{ $pulang_pergi }}</option>
            @endforeach
        </select>

        @error('pulang_pergi')
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
               value="{{ isset($reservasi_tiket->total_bayar) ? $reservasi_tiket->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar')) }}"
               required readonly>

        @error('total_bayar')
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
               name="refund" type="number" min="0" id="refund"
               value="{{ isset($rental_mobil->refund) ? $rental_mobil->refund : (old('refund') == "" ? 0 : old('refund')) }}">

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

        <select name="status" class="form-control form-control-line status" id="status" required>
            @foreach (['Baru','Dikonfirmasi','Dibatalkan','Refund'] as $status)
                <option
                    value="{{ $status }}" {{ (isset($reservasi_tiket->status) && $reservasi_tiket->status == $status) || old('status') == $status  ? 'selected' : ''}}>{{ $status }}</option>
            @endforeach
        </select>

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


