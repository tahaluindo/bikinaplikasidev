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



<div class="form-group {{ $errors->has('fasilitas_ids') ? 'has-error' : ''}}">
    <label for="fasilitas_ids" class="control-label">{{ 'Fasilitas' }}</label>

    <div class="col-md-12">
        @forelse($fasilitas as $itemFasilitas)
        <input placeholder="fasilitas_ids" class="fasilitas_ids form-control-line @error('fasilitas_ids') is-invalid @enderror"
               name="fasilitas_ids[]" type="checkbox" id="fasilitas_ids"
               value="{{ $itemFasilitas->id }}" {{ isset($mobil->mobil_fasilitas) ? ($mobil->mobil_fasilitas->where('fasilitas_id', $itemFasilitas->id)->first() ? "checked" : "") : "" }}> {{ $itemFasilitas->nama }} ({{ $itemFasilitas->deskripsi }})<br>
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
