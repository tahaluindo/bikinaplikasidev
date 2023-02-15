<div class="form-group {{ $errors->has('anggota_id') ? 'has-error' : ''}}">
    <label for="anggota_id" class="control-label">{{ 'Anggota Id' }}</label>

    <div class="col-md-12">

        <input list="anggota_id" class="form-control form-control-line" required name="anggota_id" value="{{ isset($peminjaman) ? $peminjaman->anggota_id : old('peminjaman_id') }}">

        <datalist id="anggota_id">
            @foreach ($anggotas as $anggota)
                <option
                    value="{{ $anggota->id }}" {{ (isset($peminjaman->anggota_id) && $peminjaman->anggota_id == $anggota->id) || old('anggota_id') == $anggota->id ? 'selected' : ''}}>{{ "$anggota->nama (no identitas: $anggota->no_identitas)" }}</option>
            @endforeach
        </datalist>

        @error('anggota_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('user_petugas_id') ? 'has-error' : ''}}">
    <label for="user_petugas_id" class="control-label">{{ 'User Petugas Id' }}</label>

    <div class="col-md-12">

        {{ auth()->user()->name }}
        <input type="hidden" name="user_petugas_id" value="{{ auth()->user()->id }}">

        @error('user_petugas_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'Tanggal' }}</label>

    <div class="col-md-12">
        <input placeholder="tanggal"
               class="flatpickr form-control form-control-line @error('tanggal') is-invalid @enderror" name="tanggal"
               type="text" id="tanggal"
               value="{{ isset($peminjaman->tanggal) ? $peminjaman->tanggal : (old('tanggal') == "" ? date('y-M-D') : old('tanggal'))}}"
               required>

        @error('tanggal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('tanggal_pengembalian') ? 'has-error' : ''}}">
    <label for="tanggal_pengembalian" class="control-label">{{ 'Tanggal Pengembalian' }}</label>

    <div class="col-md-12">
        <input placeholder="tanggal_pengembalian"
               class="flatpickr form-control form-control-line @error('tanggal_pengembalian') is-invalid @enderror"
               name="tanggal_pengembalian" type="text" id="tanggal_pengembalian"
               value="{{ isset($peminjaman->tanggal_pengembalian) ? $peminjaman->tanggal_pengembalian : (old('tanggal_pengembalian') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('y-M-D') : old('tanggal_pengembalian')) }}"
               required>

        @error('tanggal_pengembalian')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

@if(Route::current()->action['as'] == 'peminjaman.create')
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="control-label">{{ 'Status' }}</label>

        <div class="col-md-12">

            Berlangsung
            <input type="hidden" name="status" value="{{ "Berlangsung" }}">

            @error('status')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
@else
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="control-label">{{ 'Status' }}</label>

        <div class="col-md-12">

            <select name="status" class="form-control form-control-line" id="status" required>
                @foreach (['Berlangsung', 'Selesai', 'Perpanjangan', 'Hilang','Diganti Buku','Diganti Uang', 'Rusak'] as $status)
                    @if(!in_array($peminjaman->status, ['Selesai']))
                        <option
                            value="{{ $status }}" {{ (isset($peminjaman->status) && $peminjaman->status == $status) || old('status') == $status  ? 'selected' : ''}}>{{ $status }}</option>
                    @elseif($peminjaman->status == 'Selesai')
                        <option
                            value="{{ 'Selesai' }}" {{ (isset($peminjaman->status) && $peminjaman->status == 'Selesai') || old('status') == 'Selesai'  ? 'selected' : ''}}>{{ 'Selesai' }}</option>
                        @php break; @endphp
                    @endif
                @endforeach
            </select>

            @error('status')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
@endif

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Keterangan' }}</label>

    <div class="col-md-12">
        <input placeholder="keterangan" class="form-control form-control-line @error('keterangan') is-invalid @enderror" name="keterangan"
               type="text" id="keterangan" value="{{ isset($peminjaman->keterangan) ? $peminjaman->keterangan : old('keterangan')}}" required>

        @error('keterangan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('diganti_pada') ? 'has-error' : ''}}">
    <label for="diganti_pada" class="control-label">{{ 'Diganti Pada (Isi jika buku telah hilang dan diganti)' }}</label>

    <div class="col-md-12">
        <input placeholder="diganti_pada"
               class="flatpickr form-control form-control-line @error('diganti_pada') is-invalid @enderror"
               name="diganti_pada" type="text" id="diganti_pada"
               value="{{ isset($peminjaman->diganti_pada) ? $peminjaman->diganti_pada : (old('diganti_pada') == "" ? null : old('diganti_pada')) }}"
               required>

        @error('diganti_pada')
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
