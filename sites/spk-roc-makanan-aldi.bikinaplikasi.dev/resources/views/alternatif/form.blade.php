<div class="form-group {{ $errors->has('comunale_id') ? 'has-error' : '' }}">
    <label for="comunale_id" class="control-label">{{ 'Comunale Id' }}</label>

    <div class="col-md-12">
        <select name="comunale_id" class="form-control form-control-line" id="comunale_id">
            @foreach ($comunale as $key => $item)
                <option value="{{ $key }}"
                    {{ (isset($alternatif->comunale) && $alternatif->comunale_id == $key) || old('comunale_id') == $key ? 'selected' : '' }}>
                    {{ $item }}</option>
            @endforeach
        </select>

        @error('comunale_id')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('genre_id') ? 'has-error' : '' }}">
    <label for="genre_id" class="control-label">{{ 'Genre Id' }}</label>

    <div class="col-md-12">
        <select name="genre_id" class="form-control form-control-line" id="genre_id">
            @foreach ($genre as $key => $item)
                <option value="{{ $key }}"
                    {{ (isset($alternatif->genre) && $alternatif->genre_id == $key) || old('genre_id') == $key ? 'selected' : '' }}>
                    {{ $item }}</option>
            @endforeach
        </select>

        @error('genre_id')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror"
            name="nama" type="text" id="nama"
            value="{{ isset($alternatif->nama) ? $alternatif->nama : old('nama') }}" required>

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
    <label for="instagram" class="control-label">{{ 'Instagram' }}</label>

    <div class="col-md-12">
        <input placeholder="instagram" class="form-control form-control-line @error('instagram') is-invalid @enderror"
            name="instagram" type="text" id="instagram"
            value="{{ isset($alternatif->instagram) ? $alternatif->instagram : old('instagram') }}" required>

        @error('instagram')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

@foreach($kriteria as $key => $item)
<div class="form-group {{ $errors->has("kriteria_detail[{$key}][id]") ? 'has-error' : '' }}">
    <label for="kriteria_detail[{{$key}}][id]" class="control-label">{{ $item->nama }}</label>

    <div class="col-md-12">
        <select name="kriteria_detail[{{$key}}][id]" class="form-control form-control-line" id="kriteria_detail[{{$key}}][id]">
            @foreach ($item->kriteria_details as $key => $itemKriteriaDetail)
                @if(isset($alternatif->alternatif_details))
                    @if($alternatif->alternatif_details->where('kriteria_detail_id', $itemKriteriaDetail->id)->first())
                        <option value="{{ $alternatif->alternatif_details->where('kriteria_detail_id', $itemKriteriaDetail->id)->first()->kriteria_detail_id  }}" selected>{{ $itemKriteriaDetail->keterangan }} ({{ $itemKriteriaDetail->nilai_bobot}}) </option>

                        @php
                            continue;    
                        @endphp
                    @endif
                @endif

                <option value="{{ $itemKriteriaDetail->id }}">
                    {{ $itemKriteriaDetail->keterangan }} ({{ $itemKriteriaDetail->nilai_bobot}})</option>
            @endforeach
        </select>

        @error("kriteria_detail[$key][id]")
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endforeach

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
