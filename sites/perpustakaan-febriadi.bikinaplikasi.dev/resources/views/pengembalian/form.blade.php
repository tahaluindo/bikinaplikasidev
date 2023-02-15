<div class="form-group {{ $errors->has('peminjaman_id') ? 'has-error' : ''}}">
    <label for="peminjaman_id" class="control-label">{{ 'Peminjaman Id' }}</label>

    <div class="col-md-12">

        ID: {{ $peminjaman->id }} ({{ $peminjaman->anggota->nama }} | {{ $peminjaman->user_petugas->name }} |
        {{ $peminjaman->tanggal }} s/d {{ $peminjaman->tanggal_pengembalian }})
        <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">

        @error('peminjaman_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="peminjaman_id" class="control-label">{{ 'Buku Belum Dikembalikan' }}
        {{ $peminjaman->detail_peminjaman->count() }} Buku, Total
        {{ $peminjaman->detail_peminjaman->sum('jumlah') }}</label>

    <div class="col-md-12">

        <ul>
            @foreach($peminjaman->detail_peminjaman as $detail_peminjaman)
                <li>{{ $detail_peminjaman->buku->judul }} x {{ $detail_peminjaman->jumlah }}
                    ({{ $detail_peminjaman->status }})
                </li>
            @endforeach
        </ul>

    </div>
</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'Tanggal' }}</label>

    <div class="col-md-12">
        <input placeholder="tanggal"
               class="flatpickr form-control form-control-line @error('tanggal') is-invalid @enderror" name="tanggal"
               type="text" id="tanggal"
               value="{{ isset($pengembalian->tanggal) ? $pengembalian->tanggal : now()->format('y-M-D') }}"
               required>

        @error('tanggal')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('denda_terlambat') ? 'has-error' : ''}}">
    <label for="denda_terlambat" class="control-label">{{ 'Denda Terlambat' }}</label>

    <div class="col-md-12">
        <input min="0" placeholder="denda_terlambat"
               class="form-control form-control-line @error('denda_terlambat') is-invalid @enderror"
               name="denda_terlambat"
               type="number" id="denda_terlambat"
               value="{{isset($pengembalian->denda_terlambat) ? $pengembalian->denda_terlambat : (now() > Carbon\Carbon::parse($peminjaman->tanggal_pengembalian) ? now()->diffInDays(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)) * env('APP_DENDA_TERLAMBAT_PER_HARI') : 0) }}"
               required>

        @error('denda_terlambat')
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
