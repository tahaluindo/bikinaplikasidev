<div class="form-group {{ $errors->has('penjual_id') ? 'has-error' : ''}}">
    <label for="penjual_id" class="control-label">{{ 'Penjual Id' }}</label>
    
    <div class="col-md-12">

        <select name="penjual_id" class="form-control form-control-line" id="penjual_id" required>
            @foreach ($penjuals as $item)
                <option value="{{ $item->id }}" {{ (isset($menu->penjual_id) && $menu->penjual_id == $item->id) || old('penjual_id') == $item->id ? 'selected' : ''}}>{{ $item->user->name }}</option>
            @endforeach
        </select>

        @error('penjual_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>
    
<div class="col-md-12">
    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" type="text" id="nama" value="{{ isset($menu->nama) ? $menu->nama : old('nama') }}" required>
    
    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    <label for="harga" class="control-label">{{ 'Harga' }}</label>
    
<div class="col-md-12">
    <input placeholder="harga" class="form-control form-control-line @error('harga') is-invalid @enderror" name="harga" type="number" id="harga" value="{{ isset($menu->harga) ? $menu->harga : old('harga') }}" required>
    
    @error('harga')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ 'Deskripsi' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="deskripsi" placeholder="deskripsi" required>{{ isset($menu->deskripsi) ? $menu->deskripsi : old('deskripsi')}}</textarea>
        
        @error('deskripsi')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('stok') ? 'has-error' : ''}}">
    <label for="stok" class="control-label">{{ 'Stok' }}</label>
    
    <div class="col-md-12">

        <select name="stok" class="form-control form-control-line" id="stok" >
            @foreach (['Ada' => 'Ada', 'Kosong' => 'Kosong'] as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($menu->stok) && $menu->stok == $optionKey) || old('stok') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('stok')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'Gambar' }}</label>
    
<div class="col-md-12">
    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror" name="gambar" type="file" id="gambar" value="{{ isset($menu->gambar) ? $menu->gambar : old('gambar') }}">
    
    @error('gambar')
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
