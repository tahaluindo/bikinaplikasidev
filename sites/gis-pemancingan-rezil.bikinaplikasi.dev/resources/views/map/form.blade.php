<input type="hidden" value="{{ auth()->id() }}" name="user_id">

<div class="form-group {{ $errors->has('jenis_id') ? 'has-error' : ''}}">
    <label for="jenis_id" class="control-label">{{ 'Jenis Id' }}</label>
    <div class="col-md-12">

        <select name="jenis_id" class="form-control form-control-line" id="jenis_id" required>
            @foreach ($jenis as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($map->jenis_id) && $map->jenis_id == $optionKey) || old('jenis_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenis_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($map->nama) ? $map->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="deskripsi" placeholder="deskripsi"
                  required>{{ isset($map->deskripsi) ? $map->deskripsi : old('deskripsi')}}</textarea>

        @error('deskripsi')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'No Hp' }}</label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror"
               name="no_hp" type="text" id="no_hp" value="{{ isset($map->no_hp) ? $map->no_hp : old('no_hp') }}"
               required>

        @error('no_hp')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
                  required>{{ isset($map->alamat) ? $map->alamat : old('alamat')}}</textarea>

        @error('alamat')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>

    <div class="col-md-12">
        <input placeholder="lat" class="form-control form-control-line @error('lat') is-invalid @enderror" name="lat"
               type="text" id="lat" value="{{ isset($map->lat) ? $map->lat : old('lat') }}" required>

        @error('lat')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>

    <div class="col-md-12">
        <input placeholder="lng" class="form-control form-control-line @error('lng') is-invalid @enderror" name="lng"
               type="text" id="lng" value="{{ isset($map->lng) ? $map->lng : old('lng') }}" required>

        @error('lng')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('jam_buka') ? 'has-error' : ''}}">
    <label for="jam_buka" class="control-label">{{ 'Jam Buka' }}</label>

    <div class="col-md-12">
        <input placeholder="jam_buka" class="form-control form-control-line @error('jam_buka') is-invalid @enderror" name="jam_buka"
               type="text" id="jam_buka" value="{{ isset($map->jam_buka) ? $map->jam_buka : old('jam_buka') }}" required>

        @error('jam_buka')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('jam_tutup') ? 'has-error' : ''}}">
    <label for="jam_tutup" class="control-label">{{ 'Jam Tutup' }}</label>

    <div class="col-md-12">
        <input placeholder="jam_tutup" class="form-control form-control-line @error('jam_tutup') is-invalid @enderror" name="jam_tutup"
               type="text" id="jam_tutup" value="{{ isset($map->jam_tutup) ? $map->jam_tutup : old('jam_tutup') }}" required>

        @error('jam_tutup')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (['Diterima', 'Ditolak', 'Pending'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionValue }}" {{ (isset($map->status) && $map->status == $optionValue) || old('status') == $optionValue ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('range_harga') ? 'has-error' : ''}}">
    <label for="range_harga" class="control-label">{{ 'Range Harga' }}</label>

    <div class="col-md-12">
        <input placeholder="range_harga" class="form-control form-control-line @error('range_harga') is-invalid @enderror" name="range_harga"
               type="text" id="range_harga" value="{{ isset($map->range_harga) ? $map->range_harga : old('range_harga') }}" required>

        @error('range_harga')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('gambars') ? 'has-error' : ''}}">
    <label for="gambars" class="control-label">{{ 'gambar (Bisa pilih lebih dari 1)' }}</label>

    <input placeholder="gambars" class="form-control form-control-line @error('gambars') is-invalid @enderror"
           name="gambars[]"
           type="file" id="gambars" value="{{ isset($event->gambars) ? $event->gambars : old('gambars') }}" multiple>

    @error('gambars')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
