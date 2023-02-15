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
    <label for="buku_id" class="control-label">{{ 'Buku Id' }}</label>

    <div class="col-md-12">

        <input list="buku_id" class="form-control form-control-line" required name="buku_id">

        <datalist id="buku_id" >
            @foreach ($bukus as $buku)
                <option value="{{ $buku->id }}" {{ (isset($detail_peminjaman->buku_id) && $detail_peminjaman->buku_id == $buku->id) ? 'selected' : ''}}>{{ $buku->judul . " (Stok: $buku->stok)" }}</option>
            @endforeach
        </datalist>

        @error('buku_id')
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
