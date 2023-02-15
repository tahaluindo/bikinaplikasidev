<div class="form-group {{ $errors->has('produk_id') ? 'has-error' : ''}}">
    <label for="produk_id" class="control-label">{{ 'Nama Produk' }}</label>
    
    <div class="col-md-12">

        <select name="produk_id" class="form-control form-control-line" id="produk_id" >
            @foreach ($produks as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($data_penjualan_aktual->produk_id) && $data_penjualan_aktual->produk_id == $optionKey) || old('produk_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('produk_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('tahun_id') ? 'has-error' : ''}}">
    <label for="tahun_id" class="control-label">{{ 'Tahun' }}</label>
    
    <div class="col-md-12">
        <select name="tahun_id" class="form-control form-control-line" id="tahun_id" >
            @foreach ($tahuns as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($data_penjualan_aktual->tahun_id) && $data_penjualan_aktual->tahun_id == $optionKey) || old('tahun_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('tahun_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('tahun_id') ? 'has-error' : ''}}">
    <div class='row'>
        <div class="col-md-2">
            <label style='color: white;'>Volume</label><br>
            <strong>Januari</strong>
        </div>
        
        <div class="col-md-5">
            <label>Volume</label>
            <input placeholder="volume_januari" class="form-control form-control-line @error('volume_januari') is-invalid @enderror" name="volume_januari" type="text" id="volume_januari" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Januari')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Januari')->first()->volume : old('volume_januari') }}" >
            
            @error('volume_januari')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <label>Harga/KG</label>
            <input placeholder="harga_per_kg_januari" class="form-control form-control-line @error('harga_per_kg_januari') is-invalid @enderror" name="harga_per_kg_januari" type="text" id="harga_per_kg_januari" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Januari')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Januari')->first()->harga_per_kg : old('harga_per_kg_januari') }}" >
            
            @error('harga_per_kg_januari')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Februari</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_februari" class="form-control form-control-line @error('volume_februari') is-invalid @enderror" name="volume_februari" type="text" id="volume_februari" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Februari')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Februari')->first()->volume : old('volume_februari') }}" >
            
            @error('volume_februari')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_februari" class="form-control form-control-line @error('harga_per_kg_februari') is-invalid @enderror" name="harga_per_kg_februari" type="text" id="harga_per_kg_februari" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Februari')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Februari')->first()->harga_per_kg : old('harga_per_kg_februari') }}" >
            
            @error('harga_per_kg_februari')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Maret</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_maret" class="form-control form-control-line @error('volume_maret') is-invalid @enderror" name="volume_maret" type="text" id="volume_maret" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Maret')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Maret')->first()->volume : old('volume_maret') }}" >
            
            @error('volume_maret')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_maret" class="form-control form-control-line @error('harga_per_kg_maret') is-invalid @enderror" name="harga_per_kg_maret" type="text" id="harga_per_kg_maret" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Maret')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Maret')->first()->harga_per_kg : old('harga_per_kg_maret') }}" >
            
            @error('harga_per_kg_maret')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>April</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_april" class="form-control form-control-line @error('volume_april') is-invalid @enderror" name="volume_april" type="text" id="volume_april" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'April')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'April')->first()->volume : old('volume_april') }}" >
            
            @error('volume_april')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_april" class="form-control form-control-line @error('harga_per_kg_april') is-invalid @enderror" name="harga_per_kg_april" type="text" id="harga_per_kg_april" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'April')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'April')->first()->harga_per_kg : old('harga_per_kg_april') }}" >
            
            @error('harga_per_kg_april')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Mei</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_mei" class="form-control form-control-line @error('volume_mei') is-invalid @enderror" name="volume_mei" type="text" id="volume_mei" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Mei')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Mei')->first()->volume : old('volume_mei') }}" >
            
            @error('volume_mei')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_mei" class="form-control form-control-line @error('harga_per_kg_mei') is-invalid @enderror" name="harga_per_kg_mei" type="text" id="harga_per_kg_mei" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Mei')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Mei')->first()->harga_per_kg : old('harga_per_kg_mei') }}" >
            
            @error('harga_per_kg_mei')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Juni</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_juni" class="form-control form-control-line @error('volume_juni') is-invalid @enderror" name="volume_juni" type="text" id="volume_juni" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Juni')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Juni')->first()->volume : old('volume_juni') }}" >
            
            @error('volume_juni')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_juni" class="form-control form-control-line @error('harga_per_kg_juni') is-invalid @enderror" name="harga_per_kg_juni" type="text" id="harga_per_kg_juni" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Juni')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Juni')->first()->harga_per_kg : old('harga_per_kg_juni') }}" >
            
            @error('harga_per_kg_juni')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Juli</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_juli" class="form-control form-control-line @error('volume_juli') is-invalid @enderror" name="volume_juli" type="text" id="volume_juli" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Juli')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Juli')->first()->volume : old('volume_juli') }}" >
            
            @error('volume_juli')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_juli" class="form-control form-control-line @error('harga_per_kg_juli') is-invalid @enderror" name="harga_per_kg_juli" type="text" id="harga_per_kg_juli" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Juli')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Juli')->first()->harga_per_kg : old('harga_per_kg_juli') }}" >
            
            @error('harga_per_kg_juli')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Agustus</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_agustus" class="form-control form-control-line @error('volume_agustus') is-invalid @enderror" name="volume_agustus" type="text" id="volume_agustus" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Agustus')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Agustus')->first()->volume : old('volume_agustus') }}" >
            
            @error('volume_agustus')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_agustus" class="form-control form-control-line @error('harga_per_kg_agustus') is-invalid @enderror" name="harga_per_kg_agustus" type="text" id="harga_per_kg_agustus" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Agustus')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Agustus')->first()->harga_per_kg : old('harga_per_kg_agustus') }}" >
            
            @error('harga_per_kg_agustus')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>September</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_september" class="form-control form-control-line @error('volume_september') is-invalid @enderror" name="volume_september" type="text" id="volume_september" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'September')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'September')->first()->volume : old('volume_september') }}" >
            
            @error('volume_september')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_september" class="form-control form-control-line @error('harga_per_kg_september') is-invalid @enderror" name="harga_per_kg_september" type="text" id="harga_per_kg_september" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'September')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'September')->first()->harga_per_kg : old('harga_per_kg_september') }}" >
            
            @error('harga_per_kg_september')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Oktober</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_oktober" class="form-control form-control-line @error('volume_oktober') is-invalid @enderror" name="volume_oktober" type="text" id="volume_oktober" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Oktober')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Oktober')->first()->volume : old('volume_oktober') }}" >
            
            @error('volume_oktober')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_oktober" class="form-control form-control-line @error('harga_per_kg_oktober') is-invalid @enderror" name="harga_per_kg_oktober" type="text" id="harga_per_kg_oktober" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Oktober')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Oktober')->first()->harga_per_kg : old('harga_per_kg_oktober') }}" >
            
            @error('harga_per_kg_oktober')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>November</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_november" class="form-control form-control-line @error('volume_november') is-invalid @enderror" name="volume_november" type="text" id="volume_november" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'November')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'November')->first()->volume : old('volume_november') }}" >
            
            @error('volume_november')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_november" class="form-control form-control-line @error('harga_per_kg_november') is-invalid @enderror" name="harga_per_kg_november" type="text" id="harga_per_kg_november" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'November')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'November')->first()->harga_per_kg : old('harga_per_kg_november') }}" >
            
            @error('harga_per_kg_november')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class='row'>
        <div class="col-md-2">
            <strong>Desember</strong>
        </div>
        
        <div class="col-md-5">
            <input placeholder="volume_desember" class="form-control form-control-line @error('volume_desember') is-invalid @enderror" name="volume_desember" type="text" id="volume_desember" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Desember')->first()->volume) ? $data_penjualan_aktual_details->where('bulan', 'Desember')->first()->volume : old('volume_desember') }}" >
            
            @error('volume_desember')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="col-md-5">
            <input placeholder="harga_per_kg_desember" class="form-control form-control-line @error('harga_per_kg_desember') is-invalid @enderror" name="harga_per_kg_desember" type="text" id="harga_per_kg_desember" value="{{ isset($data_penjualan_aktual_details->where('bulan', 'Desember')->first()->harga_per_kg) ? $data_penjualan_aktual_details->where('bulan', 'Desember')->first()->harga_per_kg : old('harga_per_kg_desember') }}" >
            
            @error('harga_per_kg_desember')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success pull-right" type="submit">Simpan</button>
    </div>
</div>
