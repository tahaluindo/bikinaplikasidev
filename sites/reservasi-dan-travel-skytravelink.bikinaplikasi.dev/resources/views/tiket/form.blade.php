

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" id="nama"
               value="{{ isset($tiket->nama) ? $tiket->nama : old('nama') }}"
               required>

        @error('nama')
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
            @foreach (['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia'] as $status)
                <option
                    value="{{ $status }}" {{ (isset($tiket->status) && $tiket->status == $status) || old('status') == $status  ? 'selected' : ''}}>{{ $status }}</option>
            @endforeach
        </select>

        @error('status')
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
               value="{{ isset($tiket->jumlah) ? $tiket->jumlah : old('jumlah') }}"
               required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('mobil_id') ? 'has-error' : ''}}">
    <label for="mobil_id" class="control-label">{{ 'Mobil' }}</label>

    <div class="col-md-12">

        <input list="mobil_id" class="form-control form-control-line" required name="mobil_id" value="{{ isset($tiket->mobil_id) ? $tiket->mobil_id : old('mobil_id') }}">

        <datalist id="mobil_id">
            <option value=""></option>
            @foreach ($mobils as $mobil)
                <option
                    value="{{ $mobil->id }}" {{ (isset($tiket->mobil_id) && $tiket->mobil_id == $mobil->id) || old('mobil_id') == $mobil->id ? 'selected' : ''}}>{{ "$mobil->nama" }}</option>
            @endforeach
        </datalist>

        @error('mobil_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('rute_id') ? 'has-error' : ''}}">
    <label for="rute_id" class="control-label">{{ 'Rute' }}</label>

    <div class="col-md-12">

        <input list="rute_id" class="form-control form-control-line rute_id" required name="rute_id" value="{{ isset($tiket->rute_id) ? $tiket->rute_id : old('rute_id') }}">

        <datalist id="rute_id">
            @foreach ($rutes as $rute)
                <option
                    value="{{ $rute->id }}" {{ (isset($rute->rute_id) && $rute->rute_id == $rute->id) || old('rute_id') == $rute->id ? 'selected' : ''}}>{{ $rute->dari()->nama }} - {{ $rute->ke()->nama }} ({{ toIdr($rute->biaya) }}, Diskon pulang pergi: {{ toIdr($rute->biaya) }})</option>
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
    <label for="jadwal_id" class="control-label">{{ 'Jadwal' }}</label>

    <div class="col-md-12">

        <input list="jadwal_id" class="form-control form-control-line jadwal_id" required name="jadwal_id" value="{{ isset($tiket->jadwal_id) ? $tiket->jadwal_id : old('jadwal_id') }}">

        <datalist id="jadwal_id">
            @foreach ($jadwals as $jadwal)
                <option
                    value="{{ $jadwal->id }}" {{ (isset($tiket->jadwal_id) && $tiket->jadwal_id == $jadwal->id) || old('jadwal_id') == $jadwal->id ? 'selected' : ''}}>{{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_akhir }}</option>
            @endforeach
        </datalist>

        @error('jadwal_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('supir_id') ? 'has-error' : ''}}">
    <label for="supir_id" class="control-label">{{ 'Supir' }}</label>

    <div class="col-md-12">

        <input list="supir_id" class="form-control form-control-line supir_id" required name="supir_id" value="{{ isset($tiket->supir_id) ? $tiket->supir_id : old('supir_id') }}">

        <datalist id="supir_id">
            @foreach ($supirs as $supir)
                <option
                    value="{{ $supir->id }}" {{ (isset($tiket->supir_id) && $tiket->supir_id == $supir->id) || old('supir_id') == $supir->id ? 'selected' : ''}}>{{ $supir->name }}</option>
            @endforeach
        </datalist>

        @error('supir_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('dimulai_pada') ? 'has-error' : ''}}">
    <label for="dimulai_pada" class="control-label">{{ 'Dimulai pada' }}</label>

    <div class="col-md-12">
        <input placeholder="dimulai_pada"
               class="dimulai_pada flatpickr form-control form-control-line @error('dimulai_pada') is-invalid @enderror"
               name="dimulai_pada" type="text" id="dimulai_pada"
               value="{{ isset($tiket->dimulai_pada) ? $tiket->dimulai_pada : (old('dimulai_pada') == "" ? now()->format('d-M-Y') : old('dimulai_pada')) }}"
               required>

        @error('dimulai_pada')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('berakhir_pada') ? 'has-error' : ''}}">
    <label for="berakhir_pada" class="berakhir_pada control-label">{{ 'Berakhir Pada' }}</label>

    <div class="col-md-12">
        <input placeholder="berakhir_pada"
               class="berakhir_pada flatpickr form-control form-control-line @error('berakhir_pada') is-invalid @enderror"
               name="berakhir_pada" type="text" id="berakhir_pada"
               value="{{ isset($tiket->berakhir_pada) ? $tiket->berakhir_pada : (old('berakhir_pada') == "" ? now()->addDays(env('APP_WAKTU_PERPANJANGAN'))->format('d-M-Y') : old('berakhir_pada')) }}"
               required>

        @error('berakhir_pada')
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
                    value="{{ $pulang_pergi }}" {{ (isset($tiket->pulang_pergi) && $tiket->pulang_pergi == $pulang_pergi) || old('pulang_pergi') == $pulang_pergi  ? 'selected' : ''}}>{{ $pulang_pergi }}</option>
            @endforeach
        </select>

        @error('pulang_pergi')
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


