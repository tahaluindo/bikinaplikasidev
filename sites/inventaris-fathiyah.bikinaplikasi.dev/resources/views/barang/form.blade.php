<div class="form-group {{ $errors->has('jenis_id') ? 'has-error' : ''}}">
    <label for="jenis_id" class="control-label">{{ 'Jenis Id' }}</label>

    <div class="col-md-12">

        <select name="jenis_id" class="form-control form-control-line" id="jenis_id" required>
            @foreach ($jenis as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($barang->jenis_id) && $barang->jenis_id == $optionKey) || old('jenis_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenis_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('kode') ? 'has-error' : ''}}">
    <label for="kode" class="control-label">{{ 'Kode' }}</label>

    <div class="col-md-12">
        <input placeholder="kode" class="form-control form-control-line @error('kode') is-invalid @enderror" name="kode"
               type="text" id="kode" value="{{ isset($barang->kode) ? $barang->kode : old('kode') }}" required>

        @error('kode')
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
               type="text" id="nama" value="{{ isset($barang->nama) ? $barang->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">

    <div class="row" style="margin-left:0; margin-right:0;">
        <div class="col-md-6">
            <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>

            <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
                   name="jumlah" type="number" id="jumlah"
                   value="{{ isset($barang->jumlah) ? $barang->jumlah : old('jumlah') }}" required>

            @error('jumlah')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="jumlah" class="control-label">{{ 'Satuan' }}</label>

            <select name="satuan_id" class="form-control form-control-line" id="satuan_id" required>
                @foreach ($satuan as $optionKey => $optionValue)
                    <option
                        value="{{ $optionKey }}" {{ (isset($barang->jenis_id) && $barang->jenis_id == $optionKey) || old('jenis_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                @endforeach
            </select>

            @error('satuan_id')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('umur_manfaat') ? 'has-error' : ''}}">
    <label for="umur_manfaat" class="control-label">{{ 'Umur Manfaat' }}</label>

    <div class="col-md-12">
        <input placeholder="umur_manfaat"
               class="form-control form-control-line @error('umur_manfaat') is-invalid @enderror" name="umur_manfaat"
               type="number" id="umur_manfaat"
               value="{{ isset($barang->umur_manfaat) ? $barang->umur_manfaat : old('umur_manfaat') }}" required>

        @error('umur_manfaat')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('harga_per_unit') ? 'has-error' : ''}}">
    <label for="harga_per_unit" class="control-label">{{ 'Harga Per Unit' }}</label>

    <div class="col-md-12">
        <input placeholder="harga_per_unit"
               class="form-control form-control-line @error('harga_per_unit') is-invalid @enderror"
               name="harga_per_unit" type="number" id="harga_per_unit"
               value="{{ isset($barang->harga_per_unit) ? $barang->harga_per_unit : old('harga_per_unit') }}" required>

        @error('harga_per_unit')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('penyusutan_per_tahun') ? 'has-error' : ''}}">
    <label for="penyusutan_per_tahun" class="control-label">{{ 'Penyusutan Per Tahun (%)' }}</label>

    <div class="col-md-12">
        <input placeholder="penyusutan_per_tahun"
               class="form-control form-control-line @error('penyusutan_per_tahun') is-invalid @enderror"
               name="penyusutan_per_tahun" type="number" id="penyusutan_per_tahun"
               value="{{ isset($barang->penyusutan_per_tahun) ? $barang->penyusutan_per_tahun : old('penyusutan_per_tahun') }}"
               required>

        @error('penyusutan_per_tahun')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('kondisi') ? 'has-error' : ''}}">
    <label for="kondisi" class="control-label">{{ 'Kondisi' }}</label>

    <div class="col-md-12">

        <select name="kondisi" class="form-control form-control-line" id="kondisi" required>
            @foreach (json_decode('{"Baik":"Baik","Rusak Ringan":"Rusak Ringan","Rusak Berat":"Rusak Berat"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($barang->kondisi) && $barang->kondisi == $optionKey) || old('kondisi') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kondisi')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>


<div class="form-group" style="margin-bottom: 60px !important;">
    <div class="col-sm-12" style="margin-top: 15px;">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
