<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($paket->nama) ? $paket->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('satuan') ? 'has-error' : ''}}">
    <label for="satuan" class="control-label">{{ 'Satuan' }}</label>

    <div class="col-md-12">

        <select name="satuan" class="form-control form-control-line" id="satuan" required>
            @foreach (json_decode('{"Satuan":"Satuan","Kg":"Kg"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($paket->satuan) && $paket->satuan == $optionKey) || old('satuan') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('satuan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    <label for="harga" class="control-label">{{ 'Harga' }}</label>

    <div class="col-md-12">
        <input placeholder="harga" class="form-control form-control-line @error('harga') is-invalid @enderror"
               name="harga" type="number" id="harga" value="{{ isset($paket->harga) ? $paket->harga : old('harga') }}"
               required>

        @error('harga')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('minimal') ? 'has-error' : ''}}">
    <label for="minimal" class="control-label">{{ 'Minimal' }}</label>

    <div class="col-md-12">
        <input placeholder="minimal" class="form-control form-control-line @error('minimal') is-invalid @enderror"
               name="minimal" type="number" id="minimal"
               value="{{ isset($paket->minimal) ? $paket->minimal : old('minimal') }}" required>

        @error('minimal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('lama_pengerjaan') ? 'has-error' : ''}}">
    <label for="lama_pengerjaan" class="control-label">{{ 'Lama Pengerjaan (Dalam Jam)' }}</label>

    <div class="col-md-12">
        <input placeholder="lama_pengerjaan" class="form-control form-control-line @error('lama_pengerjaan') is-invalid @enderror"
               name="lama_pengerjaan" type="number" id="lama_pengerjaan"
               value="{{ isset($paket->lama_pengerjaan) ? $paket->lama_pengerjaan : old('lama_pengerjaan') }}" required>

        @error('lama_pengerjaan')
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
