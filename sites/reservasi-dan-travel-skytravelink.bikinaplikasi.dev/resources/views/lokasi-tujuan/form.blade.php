
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


<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="nama form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" min="0" id="nama"
               value="{{ isset($lokasi_tujuan->nama) ? $lokasi_tujuan->nama : (old('nama') == "" ? "" : old('nama')) }}"
               required>

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
        <input placeholder="deskripsi" class="deskripsi form-control form-control-line @error('deskripsi') is-invalid @enderror"
               name="deskripsi" type="text" min="0" id="deskripsi"
               value="{{ isset($lokasi_tujuan->deskripsi) ? $lokasi_tujuan->deskripsi : (old('deskripsi') == "" ? "" : old('deskripsi')) }}"
               required>

        @error('deskripsi')
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
               value="{{ isset($lokasi_tujuan_tujuan->gambar) ? $lokasi_tujuan_tujuan->gambar : old('gambar') }}">

        @error('gambar')
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
