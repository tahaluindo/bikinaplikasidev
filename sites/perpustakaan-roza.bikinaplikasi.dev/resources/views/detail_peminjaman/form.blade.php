<div class="form-group {{ $errors->has('peminjaman_id') ? 'has-error' : ''}}">
    <label for="peminjaman_id" class="control-label">{{ 'Peminjaman Id' }}</label>

    <div class="col-md-12">

        <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
        {{ $peminjaman->anggota->nama }}

        @error('peminjaman_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('buku_id') ? 'has-error' : ''}}">
    <label for="kode_buku" class="control-label">{{ 'Kode Buku' }}</label>

    <div class="col-md-12">

        <input list="kode_buku" class="form-control form-control-line" required name="kode_buku">

        <datalist id="kode_buku" >
            @foreach ($bukus as $buku)
                <option value="{{ $buku->kode_buku }}" {{ (isset($detail_peminjaman->kode_buku) && $detail_peminjaman->kode_buku == $buku->id) ? 'selected' : ''}}>{{ $buku->judul . " (Exemplar: $buku->exemplar)" }}</option>
            @endforeach
        </datalist>

        @error('kode_buku')
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
