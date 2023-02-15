<input type="hidden" name="alternatif_id" value="{{ request()->alternatif_id }}">

<div class="form-group {{ $errors->has('kriteria_detail_id') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Kriteria Detail Id' }}</label>

    <div class="col-md-12">
        <select name="kriteria_detail_id" class="form-control form-control-line" id="kriteria_detail_id">
            @foreach($kriteria->sortByDesc('nilai')->values() as $itemKriteria)
                <optgroup label="{{ $itemKriteria->nama }}">
                    @foreach ($itemKriteria->kriteria_details->sortByDesc('nilai')->values() as $item)
                        <option
                            value="{{ $item->id }}" {{ (isset($alternatif_detail->kriteria_detail) && $alternatif_detail->kriteria_detail_id == $item->id) || old('kriteria_detail_id') == $item->id ? 'selected' : ''}}>{{ $item->keterangan }} ({{ $item->nilai }})</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        @error('kriteria_detail_id')
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
