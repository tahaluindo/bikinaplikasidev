<div class="form-group {{ $errors->has('pasien_id') ? 'has-error' : ''}}">
    <label for="pasien_id" class="control-label">{{ 'Pasien Id' }}</label>
    
    <div class="col-md-12">

        <select name="pasien_id" class="form-control form-control-line" id="pasien_id" >
            @foreach ($pasiens as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($riwayat_berobat->pasien_id) && $riwayat_berobat->pasien_id == $optionKey) || old('pasien_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pasien_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('penyakit_id') ? 'has-error' : ''}}">
    <label for="penyakit_id" class="control-label">{{ 'Penyakit Id' }}</label>
    
    <div class="col-md-12">

        <select name="penyakit_id" class="form-control form-control-line" id="penyakit_id" >
            @foreach ($penyakits as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($riwayat_berobat->penyakit_id) && $riwayat_berobat->penyakit_id == $optionKey) || old('penyakit_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('penyakit_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('catatan') ? 'has-error' : ''}}">
    <label for="catatan" class="control-label">{{ 'Catatan' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="catatan" type="textarea" id="catatan" placeholder="catatan" >{{ isset($riwayat_berobat->catatan) ? $riwayat_berobat->catatan : old('catatan')}}</textarea>
        
        @error('catatan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('tanggal_berobat') ? 'has-error' : ''}}">
    <label for="tanggal_berobat" class="control-label">{{ 'Tanggal Berobat' }}</label>
    
<div class="col-md-12">
    <input placeholder="tanggal_berobat" class="form-control form-control-line @error('tanggal_berobat') is-invalid @enderror" name="tanggal_berobat" type="date" id="tanggal_berobat" value="{{ isset($riwayat_berobat->tanggal_berobat) ? $riwayat_berobat->tanggal_berobat : old('tanggal_berobat') }}" >
    
    @error('tanggal_berobat')
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
