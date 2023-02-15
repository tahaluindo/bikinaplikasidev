<div class="form-group {{ $errors->has('no_induk') ? 'has-error' : ''}}">
    <label for="no_induk" class="control-label">{{ 'No induk' }}</label>

    <div class="col-md-12">
        <input placeholder="no_induk"
            class="form-control form-control-line @error('no_induk') is-invalid @enderror" name="no_induk"
            type="text" id="no_induk" value="{{ isset($anggotum->no_induk) ? $anggotum->no_induk : old('no_induk')}}"
            required>

        @error('no_induk')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
            type="text" id="nama" value="{{ isset($anggotum->nama) ? $anggotum->nama : old('nama')}}" required>

        @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
    <label for="jenis_kelamin" class="control-label">{{ 'Jenis Kelamin' }}</label>

    <div class="col-md-12">

        <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin" required>
            @foreach (json_decode('{"Laki - Laki":"Laki - Laki","Perempuan":"Perempuan"}', true) as $optionKey =>
            $optionValue)
            <option value="{{ $optionKey }}"
                {{ ((isset($anggotum->jenis_kelamin) && $anggotum->jenis_kelamin == $optionKey) || $optionValue == old('jenis_kelamin')) ? 'selected' : ''}}>
                {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenis_kelamin')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
            required>{{ isset($anggotum->alamat) ? $anggotum->alamat : old('alamat')}}</textarea>

        @error('alamat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('no_telepon') ? 'has-error' : ''}}">
    <label for="no_telepon" class="control-label">{{ 'No Telepon' }}</label>

    <div class="col-md-12">
        <input placeholder="no_telepon" class="form-control form-control-line @error('no_telepon') is-invalid @enderror"
            name="no_telepon" type="text" id="no_telepon"
            value="{{ isset($anggotum->no_telepon) ? $anggotum->no_telepon : old('no_telepon')}}" required>

        @error('no_telepon')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">
        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (json_decode('{"Aktif":"Aktif","Tidak Aktif":"Tidak Aktif"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}"
                {{ (isset($anggotum->status) && $anggotum->status == $optionKey) || $optionValue == old('status') ? 'selected' : ''}}>{{ $optionValue }}
            </option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>



<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
