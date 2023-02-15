<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="kode_buku" class="control-label">{{ 'Kode Buku' }}</label>

    <div class="col-md-12">
        <input placeholder="kode_buku" class="form-control form-control-line @error('kode_buku') is-invalid @enderror"
            name="kode_buku" type="text" id="kode_buku" value="{{ isset($buku->kode_buku) ? $buku->kode_buku : old('kode_buku')}}" required>

        @error('kode_buku')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    <label for="judul" class="control-label">{{ 'Judul' }}</label>

    <div class="col-md-12">
        <input placeholder="judul" class="form-control form-control-line @error('judul') is-invalid @enderror"
            name="judul" type="text" id="judul" value="{{ isset($buku->judul) ? $buku->judul : old('judul')}}" required>

        @error('judul')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('penulis') ? 'has-error' : ''}}">
    <label for="penulis" class="control-label">{{ 'Penulis' }}</label>

    <div class="col-md-12">
        <input placeholder="penulis" class="form-control form-control-line @error('penulis') is-invalid @enderror"
            name="penulis" type="text" id="penulis" value="{{ isset($buku->penulis) ? $buku->penulis : old('penulis')}}"
            required>

        @error('penulis')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('penulis', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('penerbit') ? 'has-error' : ''}}">
    <label for="penerbit" class="control-label">{{ 'Penerbit' }}</label>

    <div class="col-md-12">
        <input placeholder="penerbit" class="form-control form-control-line @error('penerbit') is-invalid @enderror"
            name="penerbit" type="text" id="penerbit"
            value="{{ isset($buku->penerbit) ? $buku->penerbit : old('penerbit')}}" required>

        @error('penerbit')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('penerbit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tahun') ? 'has-error' : ''}}">
    <label for="tahun" class="control-label">{{ 'Tahun' }}</label>

    <div class="col-md-12">
        <input placeholder="tahun" class="form-control form-control-line @error('tahun') is-invalid @enderror"
            name="tahun" type="number" id="tahun" value="{{ isset($buku->tahun) ? $buku->tahun : old('tahun')}}"
            required>

        @error('tahun')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('kota') ? 'has-error' : ''}}">
    <label for="kota" class="control-label">{{ 'Kota' }}</label>

    <div class="col-md-12">
        <input placeholder="kota" class="form-control form-control-line @error('kota') is-invalid @enderror" name="kota"
            type="text" id="kota" value="{{ isset($buku->kota) ? $buku->kota : old('kota')}}" required>

        @error('kota')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('kota', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stok') ? 'has-error' : ''}}">
    <label for="stok" class="control-label">{{ 'Stok' }}</label>

    <div class="col-md-12">
        <input placeholder="stok" class="form-control form-control-line @error('stok') is-invalid @enderror" name="stok"
            type="number" id="stok" value="{{ isset($buku->stok) ? $buku->stok : old('stok')}}" required>

        @error('stok')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {!! $errors->first('stok', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>