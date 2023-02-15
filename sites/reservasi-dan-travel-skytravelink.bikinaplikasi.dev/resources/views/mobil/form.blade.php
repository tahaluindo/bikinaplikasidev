<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="nama form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" min="0" id="nama"
               value="{{ isset($mobil->nama) ? $mobil->nama : (old('nama') == "" ? "" : old('nama')) }}"
               required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jumlah_kursi') ? 'has-error' : ''}}">
    <label for="jumlah_kursi" class="control-label">{{ 'Jumlah Kursi' }}</label>

    <div class="col-md-12">
        <input placeholder="jumlah_kursi" class="jumlah_kursi form-control form-control-line @error('jumlah_kursi') is-invalid @enderror"
               name="jumlah_kursi" type="number" min="0" id="jumlah_kursi"
               value="{{ isset($mobil->jumlah_kursi) ? $mobil->jumlah_kursi : (old('jumlah_kursi') == "" ? "" : old('jumlah_kursi')) }}"
               required>

        @error('jumlah_kursi')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('biaya_rental') ? 'has-error' : ''}}">
    <label for="biaya_rental" class="control-label">{{ 'Biaya Rental' }}</label>

    <div class="col-md-12">
        <input placeholder="biaya_rental" class="biaya_rental form-control form-control-line @error('biaya_rental') is-invalid @enderror"
               name="biaya_rental" type="number" min="0" id="biaya_rental"
               value="{{ isset($mobil->biaya_rental) ? $mobil->biaya_rental : (old('biaya_rental') == "" ? "" : old('biaya_rental')) }}"
               required>

        @error('biaya_rental')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('biaya_supir') ? 'has-error' : ''}}">
    <label for="biaya_supir" class="control-label">{{ 'Biaya Supir' }}</label>

    <div class="col-md-12">
        <input placeholder="biaya_supir" class="biaya_supir form-control form-control-line @error('biaya_supir') is-invalid @enderror"
               name="biaya_supir" type="number" min="0" id="biaya_supir"
               value="{{ isset($mobil->biaya_supir) ? $mobil->biaya_supir : (old('biaya_supir') == "" ? "" : old('biaya_supir')) }}"
               required>

        @error('biaya_supir')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('ke') ? 'has-error' : ''}}">
    <label for="ke" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <input list="status" class="form-control form-control-line status" required name="status" value="{{ isset($mobil->status) ? $mobil->status : old('status') }}">

        <datalist id="status">
            <option value=""></option>
            @foreach (['Tersedia', 'Tidak Tersedia'] as $optionValue)
                <option
                    value="{{ $optionValue }}" {{ (isset($mobil->status) && $optionValue == $mobil->status) || old('status') == $optionValue ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </datalist>

        @error('status')
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
               value="{{ isset($mobil->gambar) ? $mobil->gambar : old('gambar') }}">

        @error('gambar')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="fasilitas_ids" class="control-label">{{ 'Fasilitas' }}</label>

    <div class="col-md-12">
        @forelse($fasilitas as $itemFasilitas)
        <input placeholder="fasilitas_ids" class="fasilitas_ids form-control-line @error('fasilitas_ids') is-invalid @enderror"
               name="fasilitas_ids[]" type="checkbox" id="fasilitas_ids"
               value="{{ $itemFasilitas->id }}"> {{ $itemFasilitas->nama }} ({{ $itemFasilitas->deskripsi }})<br>
        @empty
            <strong>Tidak ada fasilitas</strong>
        @endforelse

        @error('fasilitas_ids')
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
