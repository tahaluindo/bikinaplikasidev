<div class="form-group {{ $errors->has('hari') ? 'has-error' : ''}}">
    <label for="hari" class="control-label">{{ 'Hari' }}</label>

    <div class="col-md-12">
        <select name="hari" class="form-control form-control-line" id="hari">
            @foreach (['Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jum\'at' => 'Jum\'at', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($jadwal->hari) && $jadwal->hari == $optionKey) || old('hari') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('hari')
        <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jam_mulai') ? 'has-error' : ''}}">
    <label for="jam_mulai" class="control-label">{{ 'Jam Akhir' }}</label>

    <div class="col-md-12">
        <input placeholder="jam_mulai" class="jam_mulai form-control form-control-line @error('jam_mulai') is-invalid @enderror"
               name="jam_mulai" type="text" min="0" id="jam_mulai"
               value="{{ isset($jadwal->jam_mulai) ? $jadwal->jam_mulai : (old('jam_mulai') == "" ? 0 : old('jam_mulai')) }}"
               required>

        @error('jam_mulai')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jam_akhir') ? 'has-error' : ''}}">
    <label for="jam_akhir" class="control-label">{{ 'Jam Akhir' }}</label>

    <div class="col-md-12">
        <input placeholder="jam_akhir" class="jam_akhir form-control form-control-line @error('jam_akhir') is-invalid @enderror"
               name="jam_akhir" type="text" min="0" id="jam_akhir"
               value="{{ isset($jadwal->jam_akhir) ? $jadwal->jam_akhir : (old('jam_akhir') == "" ? 0 : old('jam_akhir')) }}"
               required>

        @error('jam_akhir')
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


