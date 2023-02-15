<div class="form-group {{ $errors->has('alternatif_id') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'perhitungan Id' }}</label>

    <div class="col-md-12">
        <select name="alternatif_id" class="form-control form-control-line" id="alternatif_id">
            @foreach ($perhitungans as $item)
                <option
                    value="{{ $item->id }}" {{ (isset($perhitungan_detail->perhitungan) && $perhitungan->alternatif_id == $item->alternatif_id) || old('alternatif_id') == $item->id ? 'selected' : ''}}>{{ $perhitungan->nama }}</option>
            @endforeach
        </select>

        @error('alternatif_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('kriteria_detail_id') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Kriteria Detail Id' }}</label>

    <div class="col-md-12">
        <select name="kriteria_detail_id" class="form-control form-control-line" id="kriteria_detail_id">
            @foreach ($kriteria_details as $item)
                <option
                    value="{{ $item->id }}" {{ (isset($perhitungan_detail->perhitungan) && $perhitungan->kriteria_detail_id == $item->kriteria_detail_id) || old('kriteria_detail_id') == $item->id ? 'selected' : ''}}>{{ $perhitungan->nama }}</option>
            @endforeach
        </select>

        @error('kriteria_detail_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('nilai') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Nilai' }}</label>

    <div class="col-md-12">
        <input placeholder="nilai"
            class="form-control form-control-line @error('nilai') is-invalid @enderror" name="nilai"
            type="text" id="nilai" value="{{ isset($perhitungan_detail->nilai) ? $perhitungan_detail->nilai : old('nilai')}}"
            required>

        @error('nilai')
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
