<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="nama form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" min="0" id="nama"
               value="{{ isset($paket->nama) ? $paket->nama : (old('nama') == "" ? "" : old('nama')) }}"
               required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('kenaikan_harga') ? 'has-error' : ''}}">
    <label for="kenaikan_harga" class="control-label">{{ 'Kenaikan Harga' }}</label>

    <div class="col-md-12">
        <input placeholder="kenaikan_harga" class="kenaikan_harga form-control form-control-line @error('kenaikan_harga') is-invalid @enderror"
               name="kenaikan_harga" type="number" min="0" id="kenaikan_harga"
               value="{{ isset($paket->kenaikan_harga) ? $paket->kenaikan_harga : (old('kenaikan_harga') == "" ? "" : old('kenaikan_harga')) }}"
               required>

        @error('kenaikan_harga')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('benefit') ? 'has-error' : ''}}">
    <label for="benefit" class="control-label">{{ 'Benefit (Pisahkan pakai tanda #)' }}</label>

    <div class="col-md-12">
        <input placeholder="benefit" class="benefit form-control form-control-line @error('benefit') is-invalid @enderror"
               name="benefit" type="text" min="0" id="benefit"
               value="{{ isset($paket->benefit) ? $paket->benefit : (old('benefit') == "" ? "" : old('benefit')) }}"
               required>

        @error('benefit')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('ke') ? 'has-error' : ''}}">
    <label for="ke" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <input list="status" class="form-control form-control-line status" required name="status" value="{{ isset($paket->status) ? $paket->status : old('status') }}">

        <datalist id="status">
            <option value=""></option>
            @foreach (['Tersedia', 'Tidak Tersedia'] as $optionValue)
                <option
                    value="{{ $optionValue }}" {{ (isset($paket->status) && $optionValue == $paket->status) || old('status') == $optionValue ? 'selected' : ''}}>{{ $optionValue }}</option>
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
