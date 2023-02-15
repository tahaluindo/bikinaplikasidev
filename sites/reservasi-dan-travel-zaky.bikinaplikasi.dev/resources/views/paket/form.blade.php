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

<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    <label for="harga" class="control-label">{{ 'Harga' }}</label>

    <div class="col-md-12">
        <input placeholder="harga" class="harga form-control form-control-line @error('harga') is-invalid @enderror"
               name="harga" type="number" min="0" id="harga"
               value="{{ isset($paket->harga) ? $paket->harga : (old('harga') == "" ? "" : old('harga')) }}"
               required>

        @error('harga')
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

<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>

    <div class="col-md-12">
        <input placeholder="deskripsi" class="deskripsi form-control form-control-line @error('deskripsi') is-invalid @enderror"
               name="deskripsi" type="text" min="0" id="deskripsi"
               value="{{ isset($paket->deskripsi) ? $paket->deskripsi : (old('deskripsi') == "" ? "" : old('deskripsi')) }}"
               required>

        @error('deskripsi')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('ke') ? 'has-error' : ''}}">
    <label for="ke" class="control-label">{{ 'Spesial Offer?' }}</label>

    <div class="col-md-12">

        <input list="spesial_offer" class="form-control form-control-line spesial_offer" required name="spesial_offer" value="{{ isset($paket->spesial_offer) ? $paket->spesial_offer : old('spesial_offer') }}">

        <datalist id="spesial_offer">
            <option value=""></option>
            @foreach (['Ya', 'Tidak'] as $optionValue)
                <option
                    value="{{ $optionValue }}" {{ (isset($paket->spesial_offer) && $optionValue == $paket->spesial_offer) || old('spesial_offer') == $optionValue ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </datalist>

        @error('spesial_offer')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('off') ? 'has-error' : ''}}">
    <label for="off" class="control-label">{{ 'Off (%)' }}</label>

    <div class="col-md-12">
        <input placeholder="off" class="off form-control form-control-line @error('off') is-invalid @enderror"
               name="off" type="text" min="0" id="off"
               value="{{ isset($paket->off) ? $paket->off : (old('off') == "" ? "" : old('off')) }}"
               required>

        @error('off')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'Gambar' }}</label>

    <div class="col-md-12">
        <input placeholder="gambar" class="gambar form-control form-control-line @error('gambar') is-invalid @enderror"
               name="gambar" type="file" id="gambar"
               value="{{ isset($paket->gambar) ? $paket->gambar : old('gambar') }}">

        @error('gambar')
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
