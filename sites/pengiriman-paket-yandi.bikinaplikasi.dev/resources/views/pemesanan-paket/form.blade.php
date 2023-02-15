<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" name="user_id" value="{{ isset($pemesanan_paket->user_id) ? $pemesanan_paket->user_id : old('user_id') }}">

        <datalist id="user_id">
            <option value=""></option>
            @foreach ($users as $user)
                <option
                    value="{{ $user->id }}" {{ (isset($pemesanan_paket->user_id) && $pemesanan_paket->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''}}>{{ "$user->name" }}</option>
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
    <label for="paket_id" class="control-label">{{ 'Paket Id' }}</label>

    <div class="col-md-12">

        <input list="paket_id" class="form-control form-control-line paket_id" required name="paket_id" value="{{ isset($pemesanan_paket->paket_id) ? $pemesanan_paket->paket_id : old('paket_id') }}">

        <datalist id="paket_id">
            @foreach ($pakets as $paket)
                <option
                    value="{{ $paket->id }}" {{ (isset($pemesanan_paket->paket_id) && $pemesanan_paket->paket_id == $paket->id) || old('paket_id') == $paket->id ? 'selected' : ''}}>{{ $paket->nama }} - {{ toIdr($paket->harga) }}</option>
            @endforeach
        </datalist>

        @error('paket_id')
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

<div class="form-group {{ $errors->has('total_bayar') ? 'has-error' : ''}}">
    <label for="total_bayar" class="control-label">{{ 'Total Bayar' }}</label>

    <div class="col-md-12">
        <input placeholder="total_bayar"
               class="form-control form-control-line @error('total_bayar') is-invalid @enderror"
               name="total_bayar" type="number" min="1" id="total_bayar"
               value="{{ isset($pemesanan_paket->total_bayar) ? $pemesanan_paket->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar')) }}"
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
               class="refund form-control form-control-line @error('refund') is-invalid @enderror"
               name="refund" type="number" min="0" id="refund"
               value="{{ isset($pemesanan_paket->refund) ? $pemesanan_paket->refund : (old('refund') == "" ? 0 : old('refund')) }}">

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
            @foreach (['Baru','Dikirim','Dibatalkan','Refund'] as $status)
                <option
                    value="{{ $status }}" {{ (isset($pemesanan_paket->status) && $pemesanan_paket->status == $status) || old('status') == $status  ? 'selected' : ''}}>{{ $status }}</option>
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


