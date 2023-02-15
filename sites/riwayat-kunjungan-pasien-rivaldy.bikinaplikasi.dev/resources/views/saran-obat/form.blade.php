<div class="form-group {{ $errors->has('penyakit_id') ? 'has-error' : ''}}">
    <label for="penyakit_id" class="control-label">{{ 'Penyakit Id' }}</label>
    
    <div class="col-md-12">

        <select name="penyakit_id" class="form-control form-control-line" id="penyakit_id" >
            @foreach ($penyakits as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($saranobat->penyakit_id) && $saranobat->penyakit_id == $optionKey) || old('penyakit_id') == $optionKey  || request()->penyakit_id == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('penyakit_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('obat_id') ? 'has-error' : ''}}">
    <label for="obat_id" class="control-label">{{ 'Obat Id' }}</label>
    
    <div class="col-md-12">

        <select name="obat_id" class="form-control form-control-line" id="obat_id" >
            @foreach ($obats as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($saranobat->obat_id) && $saranobat->obat_id == $optionKey) || old('obat_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('obat_id')
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
