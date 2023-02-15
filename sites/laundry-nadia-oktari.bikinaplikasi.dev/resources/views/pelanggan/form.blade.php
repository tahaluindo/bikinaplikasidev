<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($pelanggan->nama) ? $pelanggan->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jk') ? 'has-error' : ''}}">
    <label for="jk" class="control-label">{{ 'Jk' }}</label>

    <div class="col-md-12">

        <select name="jk" class="form-control form-control-line" id="jk" required>
            @foreach (json_decode('{"Laki - Laki":"Laki - Laki","Perempuan":"Perempuan"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pelanggan->jk) && $pelanggan->jk == $optionKey) || old('jk') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jk')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>

    <div class="col-md-12">
        <input placeholder="alamat" class="form-control form-control-line @error('alamat') is-invalid @enderror"
               name="alamat" type="text" id="alamat"
               value="{{ isset($pelanggan->alamat) ? $pelanggan->alamat : old('alamat') }}" required>

        @error('alamat')
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
               name="no_hp" type="text" id="no_hp"
               value="{{ isset($pelanggan->no_hp) ? $pelanggan->no_hp : old('no_hp') }}" required>

        @error('no_hp')
        <span class="invalid-feedback text-danger" role="alert">
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
