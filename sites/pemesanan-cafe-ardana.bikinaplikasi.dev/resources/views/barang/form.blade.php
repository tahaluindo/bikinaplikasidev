<div class="form-group {{ $errors->has('no_barang') ? 'has-error' : ''}}">
    <label for="no_barang" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror"
               name="nama" type="text" id="nama" value="{{ isset($barang->nama) ? $barang->nama : old('nama') }}"
               required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>


<div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="satuan" class="control-label">{{ 'Satuan' }}</label>

    <div class="col-md-12">

        <select name="satuan" class="form-control form-control-line" id="satuan" required>
            @foreach (['Kg', 'Karung', 'Pcs'] as $optionKey => $optionValue)
                <option value="{{ $optionKey }}"
                    {{ (isset($unit_kerja->satuan) && $unit_kerja->satuan == $optionKey) || old('satuan') == $optionKey ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('satuan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('no_barang') ? 'has-error' : ''}}">
    <label for="stok" class="control-label">{{ 'Stok' }}</label>

    <div class="col-md-12">
        <input placeholder="stok" class="form-control form-control-line @error('stok') is-invalid @enderror"
               name="stok" type="text" id="stok" value="{{ isset($barang->stok) ? $barang->stok : old('stok') }}"
               required>

        @error('stok')
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
