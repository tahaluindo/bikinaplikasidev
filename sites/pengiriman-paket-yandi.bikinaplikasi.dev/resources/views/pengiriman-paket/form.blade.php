<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" name="user_id" value="{{ isset($pengiriman_paket->user_id) ? $pengiriman_paket->user_id : old('user_id') }}">

        <datalist id="user_id">
            <option value=""></option>
            @foreach ($users as $user)
                <option
                    value="{{ $user->id }}" {{ (isset($pengiriman_paket->user_id) && $pengiriman_paket->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''}}>{{ "$user->name" }}</option>
            @endforeach
        </datalist>

        @error('user_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('paket_id') ? 'has-error' : ''}}">
    <label for="paket_id" class="control-label">{{ 'Paket Id' }}</label>

    <div class="col-md-12">

        <select name="paket_id" class="form-control">
            @foreach ($pakets as $paket)
                <option
                    value="{{ $paket->id }}" {{ (isset($pengiriman_paket->paket_id) && $pengiriman_paket->paket_id == $paket->id) || old('paket_id') == $paket->id ? 'selected' : ''}}>{{ $paket->nama }} +{{ toIdr($paket->kenaikan_harga) }}</option>
            @endforeach
        </select>

        @error('paket_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('rute_id') ? 'has-error' : ''}}">
    <label for="rute_id" class="control-label">{{ 'Rute Id' }}</label>

    <div class="col-md-12">

        <input list="rute_id" class="form-control form-control-line rute_id" required name="rute_id" value="{{ isset($pengiriman_paket->rute_id) ? $pengiriman_paket->rute_id : old('rute_id') }}">

        <datalist id="rute_id">
            @foreach ($rutes as $rute)
                <option
                    value="{{ $rute->id }}" {{ (isset($pengiriman_paket->rute_id) && $pengiriman_paket->rute_id == $rute->id) || old('rute_id') == $rute->id ? 'selected' : ''}}>{{ $rute->dari()->nama }} - {{ $rute->ke()->nama }} | {{ toIdr($rute->biaya) }}</option>
            @endforeach
        </datalist>

        @error('rute_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jadwal_id') ? 'has-error' : ''}}">
    <label for="jadwal_id" class="control-label">{{ 'Jadwal Id' }}</label>

    <div class="col-md-12">

        <input list="jadwal_id" class="form-control form-control-line jadwal_id" required name="jadwal_id" value="{{ isset($pengiriman_paket->jadwal_id) ? $pengiriman_paket->jadwal->id : old('jadwal_id') }}">

        <datalist id="jadwal_id">
            @foreach ($jadwals as $jadwal)
                <option
                    value="{{ $jadwal->id }}" {{ (isset($pengiriman_paket->jadwal) && $pengiriman_paket->jadwal_id == $jadwal->id) || old('jadwal') == $jadwal->id ? 'selected' : ''}}>{{ $jadwal->hari }} - {{ $jadwal->jam_mulai }}  - {{ $jadwal->jam_akhir }}</option>
            @endforeach
        </datalist>

        @error('jadwal')
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
               value="{{ isset($pengiriman_paket->jumlah) ? $pengiriman_paket->jumlah : (old('jumlah') == "" ? "1" : old('jumlah')) }}"
               required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('diantar_pada') ? 'has-error' : ''}}">
    <label for="diantar_pada" class="control-label">{{ 'Diantar Pada' }}</label>

    <div class="col-md-12">
        <input placeholder="diantar_pada"
               class="flatpickr form-control form-control-line @error('diantar_pada') is-invalid @enderror"
               name="diantar_pada" type="text" id="diantar_pada"
               value="{{ isset($pengiriman_paket->diantar_pada) ? $pengiriman_paket->diantar_pada : (old('diantar_pada') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('d-M-Y') : old('diantar_pada')) }}"
               required>

        @error('diantar_pada')
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
               value="{{ isset($pengiriman_paket->total_bayar) ? $pengiriman_paket->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar')) }}"
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
            @foreach (['Baru','Dikirim','Dibatalkan','Refund', 'Diterima'] as $status)
                <option
                    value="{{ $status }}" {{ (isset($pengiriman_paket->status) && $pengiriman_paket->status == $status) || old('status') == $status  ? 'selected' : ''}}>{{ $status }}</option>
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
        <textarea placeholder="catatan" class="catatan form-control form-control-line @error('catatan') is-invalid @enderror"
               name="catatan" type="text" min="1" id="catatan"
               required>{{ isset($pengiriman_paket->catatan) ? $pengiriman_paket->catatan : (old('catatan') == "" ? "-" : old('catatan')) }}</textarea>

        @error('catatan')
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


