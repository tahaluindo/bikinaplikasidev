<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Perhitungan' }}</label>

    <div class="col-md-12">
        <select name="perhitungan_id" class="form-control form-control-line" id="perhitungan_id" style="display: none;">
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

<div class="form-group {{ $errors->has('urutan_prioritas') ? 'has-error' : ''}}">
    <label for="urutan_prioritas" class="control-label">{{ 'Urutan prioritas' }}</label>

    <div class="col-md-12">
        <input placeholder="urutan_prioritas"
            class="form-control form-control-line @error('urutan_prioritas') is-invalid @enderror" name="urutan_prioritas"
            type="text" id="urutan_prioritas" value="{{ isset($alternatif->urutan_prioritas) ? $alternatif->urutan_prioritas : old('urutan_prioritas')}}"
            required>

        @error('urutan_prioritas')
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
