<div class="form-group {{ $errors->has('detail_penjualan_prediksi_id') ? 'has-error' : ''}}">
    <label for="detail_penjualan_prediksi_id" class="control-label">{{ 'Detail Penjualan Prediksi Id' }}</label>
    
    <div class="col-md-12">

        <select name="detail_penjualan_prediksi_id" class="form-control form-control-line" id="detail_penjualan_prediksi_id" required>
            @foreach (json_decode('[{"$detail_penjualan_prediksi->id":"$detail_penjualan_prediksi->nama"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($datapenjualanprediksidetail->detail_penjualan_prediksi_id) && $datapenjualanprediksidetail->detail_penjualan_prediksi_id == $optionKey) || old('detail_penjualan_prediksi_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('detail_penjualan_prediksi_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('volume_januari') ? 'has-error' : ''}}">
    <label for="volume_januari" class="control-label">{{ 'Volume Januari' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_januari" class="form-control form-control-line @error('volume_januari') is-invalid @enderror" name="volume_januari" type="number" id="volume_januari" value="{{ isset($datapenjualanprediksidetail->volume_januari) ? $datapenjualanprediksidetail->volume_januari : old('volume_januari') }}" required>
    
    @error('volume_januari')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_februari') ? 'has-error' : ''}}">
    <label for="volume_februari" class="control-label">{{ 'Volume Februari' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_februari" class="form-control form-control-line @error('volume_februari') is-invalid @enderror" name="volume_februari" type="number" id="volume_februari" value="{{ isset($datapenjualanprediksidetail->volume_februari) ? $datapenjualanprediksidetail->volume_februari : old('volume_februari') }}" required>
    
    @error('volume_februari')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_maret') ? 'has-error' : ''}}">
    <label for="volume_maret" class="control-label">{{ 'Volume Maret' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_maret" class="form-control form-control-line @error('volume_maret') is-invalid @enderror" name="volume_maret" type="number" id="volume_maret" value="{{ isset($datapenjualanprediksidetail->volume_maret) ? $datapenjualanprediksidetail->volume_maret : old('volume_maret') }}" required>
    
    @error('volume_maret')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_april') ? 'has-error' : ''}}">
    <label for="volume_april" class="control-label">{{ 'Volume April' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_april" class="form-control form-control-line @error('volume_april') is-invalid @enderror" name="volume_april" type="number" id="volume_april" value="{{ isset($datapenjualanprediksidetail->volume_april) ? $datapenjualanprediksidetail->volume_april : old('volume_april') }}" required>
    
    @error('volume_april')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_mei') ? 'has-error' : ''}}">
    <label for="volume_mei" class="control-label">{{ 'Volume Mei' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_mei" class="form-control form-control-line @error('volume_mei') is-invalid @enderror" name="volume_mei" type="number" id="volume_mei" value="{{ isset($datapenjualanprediksidetail->volume_mei) ? $datapenjualanprediksidetail->volume_mei : old('volume_mei') }}" required>
    
    @error('volume_mei')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_juni') ? 'has-error' : ''}}">
    <label for="volume_juni" class="control-label">{{ 'Volume Juni' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_juni" class="form-control form-control-line @error('volume_juni') is-invalid @enderror" name="volume_juni" type="number" id="volume_juni" value="{{ isset($datapenjualanprediksidetail->volume_juni) ? $datapenjualanprediksidetail->volume_juni : old('volume_juni') }}" required>
    
    @error('volume_juni')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_juli') ? 'has-error' : ''}}">
    <label for="volume_juli" class="control-label">{{ 'Volume Juli' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_juli" class="form-control form-control-line @error('volume_juli') is-invalid @enderror" name="volume_juli" type="number" id="volume_juli" value="{{ isset($datapenjualanprediksidetail->volume_juli) ? $datapenjualanprediksidetail->volume_juli : old('volume_juli') }}" required>
    
    @error('volume_juli')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_agustus') ? 'has-error' : ''}}">
    <label for="volume_agustus" class="control-label">{{ 'Volume Agustus' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_agustus" class="form-control form-control-line @error('volume_agustus') is-invalid @enderror" name="volume_agustus" type="number" id="volume_agustus" value="{{ isset($datapenjualanprediksidetail->volume_agustus) ? $datapenjualanprediksidetail->volume_agustus : old('volume_agustus') }}" required>
    
    @error('volume_agustus')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_september') ? 'has-error' : ''}}">
    <label for="volume_september" class="control-label">{{ 'Volume September' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_september" class="form-control form-control-line @error('volume_september') is-invalid @enderror" name="volume_september" type="number" id="volume_september" value="{{ isset($datapenjualanprediksidetail->volume_september) ? $datapenjualanprediksidetail->volume_september : old('volume_september') }}" required>
    
    @error('volume_september')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_oktober') ? 'has-error' : ''}}">
    <label for="volume_oktober" class="control-label">{{ 'Volume Oktober' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_oktober" class="form-control form-control-line @error('volume_oktober') is-invalid @enderror" name="volume_oktober" type="number" id="volume_oktober" value="{{ isset($datapenjualanprediksidetail->volume_oktober) ? $datapenjualanprediksidetail->volume_oktober : old('volume_oktober') }}" required>
    
    @error('volume_oktober')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_november') ? 'has-error' : ''}}">
    <label for="volume_november" class="control-label">{{ 'Volume November' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_november" class="form-control form-control-line @error('volume_november') is-invalid @enderror" name="volume_november" type="number" id="volume_november" value="{{ isset($datapenjualanprediksidetail->volume_november) ? $datapenjualanprediksidetail->volume_november : old('volume_november') }}" required>
    
    @error('volume_november')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('volume_desember') ? 'has-error' : ''}}">
    <label for="volume_desember" class="control-label">{{ 'Volume Desember' }}</label>
    
<div class="col-md-12">
    <input placeholder="volume_desember" class="form-control form-control-line @error('volume_desember') is-invalid @enderror" name="volume_desember" type="number" id="volume_desember" value="{{ isset($datapenjualanprediksidetail->volume_desember) ? $datapenjualanprediksidetail->volume_desember : old('volume_desember') }}" required>
    
    @error('volume_desember')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_januari') ? 'has-error' : ''}}">
    <label for="harga_per_kg_januari" class="control-label">{{ 'Harga Per Kg Januari' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_januari" class="form-control form-control-line @error('harga_per_kg_januari') is-invalid @enderror" name="harga_per_kg_januari" type="number" id="harga_per_kg_januari" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_januari) ? $datapenjualanprediksidetail->harga_per_kg_januari : old('harga_per_kg_januari') }}" required>
    
    @error('harga_per_kg_januari')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_februari') ? 'has-error' : ''}}">
    <label for="harga_per_kg_februari" class="control-label">{{ 'Harga Per Kg Februari' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_februari" class="form-control form-control-line @error('harga_per_kg_februari') is-invalid @enderror" name="harga_per_kg_februari" type="number" id="harga_per_kg_februari" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_februari) ? $datapenjualanprediksidetail->harga_per_kg_februari : old('harga_per_kg_februari') }}" required>
    
    @error('harga_per_kg_februari')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_maret') ? 'has-error' : ''}}">
    <label for="harga_per_kg_maret" class="control-label">{{ 'Harga Per Kg Maret' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_maret" class="form-control form-control-line @error('harga_per_kg_maret') is-invalid @enderror" name="harga_per_kg_maret" type="number" id="harga_per_kg_maret" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_maret) ? $datapenjualanprediksidetail->harga_per_kg_maret : old('harga_per_kg_maret') }}" required>
    
    @error('harga_per_kg_maret')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_april') ? 'has-error' : ''}}">
    <label for="harga_per_kg_april" class="control-label">{{ 'Harga Per Kg April' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_april" class="form-control form-control-line @error('harga_per_kg_april') is-invalid @enderror" name="harga_per_kg_april" type="number" id="harga_per_kg_april" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_april) ? $datapenjualanprediksidetail->harga_per_kg_april : old('harga_per_kg_april') }}" required>
    
    @error('harga_per_kg_april')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_mei') ? 'has-error' : ''}}">
    <label for="harga_per_kg_mei" class="control-label">{{ 'Harga Per Kg Mei' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_mei" class="form-control form-control-line @error('harga_per_kg_mei') is-invalid @enderror" name="harga_per_kg_mei" type="number" id="harga_per_kg_mei" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_mei) ? $datapenjualanprediksidetail->harga_per_kg_mei : old('harga_per_kg_mei') }}" required>
    
    @error('harga_per_kg_mei')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_juni') ? 'has-error' : ''}}">
    <label for="harga_per_kg_juni" class="control-label">{{ 'Harga Per Kg Juni' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_juni" class="form-control form-control-line @error('harga_per_kg_juni') is-invalid @enderror" name="harga_per_kg_juni" type="number" id="harga_per_kg_juni" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_juni) ? $datapenjualanprediksidetail->harga_per_kg_juni : old('harga_per_kg_juni') }}" >
    
    @error('harga_per_kg_juni')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_juli') ? 'has-error' : ''}}">
    <label for="harga_per_kg_juli" class="control-label">{{ 'Harga Per Kg Juli' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_juli" class="form-control form-control-line @error('harga_per_kg_juli') is-invalid @enderror" name="harga_per_kg_juli" type="number" id="harga_per_kg_juli" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_juli) ? $datapenjualanprediksidetail->harga_per_kg_juli : old('harga_per_kg_juli') }}" required>
    
    @error('harga_per_kg_juli')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_juli') ? 'has-error' : ''}}">
    <label for="harga_per_kg_juli" class="control-label">{{ 'Harga Per Kg Juli' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_juli" class="form-control form-control-line @error('harga_per_kg_juli') is-invalid @enderror" name="harga_per_kg_juli" type="number" id="harga_per_kg_juli" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_juli) ? $datapenjualanprediksidetail->harga_per_kg_juli : old('harga_per_kg_juli') }}" required>
    
    @error('harga_per_kg_juli')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_agustus') ? 'has-error' : ''}}">
    <label for="harga_per_kg_agustus" class="control-label">{{ 'Harga Per Kg Agustus' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_agustus" class="form-control form-control-line @error('harga_per_kg_agustus') is-invalid @enderror" name="harga_per_kg_agustus" type="number" id="harga_per_kg_agustus" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_agustus) ? $datapenjualanprediksidetail->harga_per_kg_agustus : old('harga_per_kg_agustus') }}" required>
    
    @error('harga_per_kg_agustus')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_september') ? 'has-error' : ''}}">
    <label for="harga_per_kg_september" class="control-label">{{ 'Harga Per Kg September' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_september" class="form-control form-control-line @error('harga_per_kg_september') is-invalid @enderror" name="harga_per_kg_september" type="number" id="harga_per_kg_september" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_september) ? $datapenjualanprediksidetail->harga_per_kg_september : old('harga_per_kg_september') }}" required>
    
    @error('harga_per_kg_september')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga_per_kg_desember') ? 'has-error' : ''}}">
    <label for="harga_per_kg_desember" class="control-label">{{ 'Harga Per Kg Desember' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga_per_kg_desember" class="form-control form-control-line @error('harga_per_kg_desember') is-invalid @enderror" name="harga_per_kg_desember" type="number" id="harga_per_kg_desember" value="{{ isset($datapenjualanprediksidetail->harga_per_kg_desember) ? $datapenjualanprediksidetail->harga_per_kg_desember : old('harga_per_kg_desember') }}" required>
    
    @error('harga_per_kg_desember')
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
