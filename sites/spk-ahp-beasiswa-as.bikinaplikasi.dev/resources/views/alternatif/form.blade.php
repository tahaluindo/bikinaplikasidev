<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Perhitungan' }}</label>

    <div class="col-md-12">
        <select name="perhitungan_id" class="form-control form-control-line" id="perhitungan_id">
            @foreach ($perhitungans as $item)
                <option
                    value="{{ $item->id }}" {{ (isset($alternatif->perhitungan) && $alternatif->perhitungan_id == $item->perhitungan_id) || old('perhitungan_id') == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
            @endforeach
        </select>

        @error('perhitungan_id')
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
            type="text" id="nama" value="{{ isset($alternatif->nama) ? $alternatif->nama : old('nama')}}" required>

        @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('no_identitas') ? 'has-error' : ''}}">
    <label for="no_identitas" class="control-label">{{ 'No identitas' }}</label>

    <div class="col-md-12">
        <input placeholder="no_identitas"
            class="form-control form-control-line @error('no_identitas') is-invalid @enderror" name="no_identitas"
            type="number" id="no_identitas" value="{{ isset($alternatif->no_identitas) ? $alternatif->no_identitas : old('no_identitas')}}"
            required min="999999">

        @error('no_identitas')
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
            required>{{ isset($alternatif->alamat) ? $alternatif->alamat : old('alamat')}}</textarea>

        @error('alamat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'No Hp' }}</label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror"
            name="no_hp" type="number" id="no_hp"
            value="{{ isset($alternatif->no_hp) ? $alternatif->no_hp : old('no_hp')}}" required min="99999999">

        @error('no_hp')
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
