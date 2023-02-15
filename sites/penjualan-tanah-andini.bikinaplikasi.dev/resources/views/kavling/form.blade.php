<div class="form-group {{ $errors->has('kategori_id') ? 'has-error' : ''}}">
    <label for="kategori_id" class="control-label">{{ ucwords('Kategori Id') }}</label>

    <div class="col-md-12">

        <select name="kategori_id" class="form-control form-control-line" id="kategori_id" required>
            @foreach ($kategori as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kavling->kategori_id) && $kavling->kategori_id == $optionKey) || old('kategori_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kategori_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('luas_tanah') ? 'has-error' : ''}}">
    <label for="luas_tanah" class="control-label">{{ ucwords('Luas Tanah') }}</label>
    <div class="col-md-12">
        <input placeholder="luas_tanah" class="form-control form-control-line @error('luas_tanah') is-invalid @enderror"
               name="luas_tanah" type="text" id="luas_tanah"
               value="{{ isset($kavling->luas_tanah) ? $kavling->luas_tanah : old('luas_tanah') }}" required>

        @error('luas_tanah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('nomor_kavling') ? 'has-error' : ''}}">
    <label for="nomor_kavling" class="control-label">{{ ucwords('Nomor Kavling') }}</label>
    <div class="col-md-12">
        <input placeholder="nomor_kavling"
               class="form-control form-control-line @error('nomor_kavling') is-invalid @enderror" name="nomor_kavling"
               type="text" id="nomor_kavling"
               value="{{ isset($kavling->nomor_kavling) ? $kavling->nomor_kavling : old('nomor_kavling') }}" required>

        @error('nomor_kavling')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    <label for="harga" class="control-label">{{ ucwords('Harga') }}</label>
    <div class="col-md-12">
        <input placeholder="harga" class="form-control form-control-line @error('harga') is-invalid @enderror"
               name="harga" type="number" id="harga"
               value="{{ isset($kavling->harga) ? $kavling->harga : old('harga') }}" required>

        @error('harga')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('angsuran') ? 'has-error' : ''}}">
    <label for="angsuran" class="control-label">{{ ucwords('Angsuran') }}</label>
    <div class="col-md-12">
        <input placeholder="angsuran" class="form-control form-control-line @error('angsuran') is-invalid @enderror"
               name="angsuran" type="number" id="angsuran"
               value="{{ isset($kavling->angsuran) ? $kavling->angsuran : old('angsuran') }}" required>

        @error('angsuran')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('ukuran') ? 'has-error' : ''}}">
    <label for="ukuran" class="control-label">{{ ucwords('Ukuran') }}</label>
    <div class="col-md-12">
        <input placeholder="ukuran" class="form-control form-control-line @error('ukuran') is-invalid @enderror"
               name="ukuran" type="text" id="ukuran"
               value="{{ isset($kavling->ukuran) ? $kavling->ukuran : old('ukuran') }}" required>

        @error('ukuran')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('tipe') ? 'has-error' : ''}}">
    <label for="tipe" class="control-label">{{ ucwords('Tipe') }}</label>
    <div class="col-md-12">
        <input placeholder="tipe" class="form-control form-control-line @error('tipe') is-invalid @enderror" name="tipe"
               type="text" id="tipe" value="{{ isset($kavling->tipe) ? $kavling->tipe : old('tipe') }}" required>

        @error('tipe')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('no_ppjb') ? 'has-error' : ''}}">
    <label for="no_ppjb" class="control-label">{{ ucwords('No Ppjb') }}</label>
    <div class="col-md-12">
        <input placeholder="no_ppjb" class="form-control form-control-line @error('no_ppjb') is-invalid @enderror"
               name="no_ppjb" type="text" id="no_ppjb"
               value="{{ isset($kavling->no_ppjb) ? $kavling->no_ppjb : old('no_ppjb') }}" required>

        @error('no_ppjb')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('no_ajb') ? 'has-error' : ''}}">
    <label for="no_ajb" class="control-label">{{ ucwords('No Ajb') }}</label>
    <div class="col-md-12">
        <input placeholder="no_ajb" class="form-control form-control-line @error('no_ajb') is-invalid @enderror"
               name="no_ajb" type="text" id="no_ajb"
               value="{{ isset($kavling->no_ajb) ? $kavling->no_ajb : old('no_ajb') }}" required>

        @error('no_ajb')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('status_tanah') ? 'has-error' : ''}}">
    <label for="status_tanah" class="control-label">{{ ucwords('Status') }}</label>

    <div class="col-md-12">

        @if(isset($kavling))
            @if($kavling->penjualan)
                <select name="status" class="form-control form-control-line" id="status_tanah" required>
                    @foreach (["Terjual" => "Terjual"] as $optionKey => $optionValue)
                        <option
                            value="{{ $optionKey }}" {{ (isset($kavling->status_tanah) && $kavling->status_tanah == $optionKey) || old('status_tanah') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
            @else
                <select name="status" class="form-control form-control-line" id="status_tanah" required>
                    @foreach (["Belum Terjual" => "Belum Terjual"] as $optionKey => $optionValue)
                        <option
                            value="{{ $optionKey }}" {{ (isset($kavling->status_tanah) && $kavling->status_tanah == $optionKey) || old('status_tanah') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
            @endif
        @else
            <select name="status" class="form-control form-control-line" id="status_tanah" required>
                @foreach (["Belum Terjual" => "Belum Terjual"] as $optionKey => $optionValue)
                    <option
                        value="{{ $optionKey }}" {{ (isset($kavling->status_tanah) && $kavling->status_tanah == $optionKey) || old('status_tanah') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                @endforeach
            </select>
        @endif

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'Gambar' }}</label>

    <div class="col-md-12">
        <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
               name="gambar" type="file" id="gambar"
               value="{{ isset($produk->gambar ?? "") ? $produk->gambar ?? "" : old('gambar') }}">

        @error('gambar')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('blok') ? 'has-error' : ''}}">
    <label for="blok" class="control-label">{{ ucwords('Blok') }}</label>
    <div class="col-md-12">
        <input placeholder="blok" class="form-control form-control-line @error('blok') is-invalid @enderror"
               name="blok" type="text" id="blok"
               value="{{ isset($kavling->blok) ? $kavling->blok : old('blok') }}" required>

        @error('blok')
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
