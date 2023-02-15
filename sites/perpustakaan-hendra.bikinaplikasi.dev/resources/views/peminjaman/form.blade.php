<div class="form-group {{ $errors->has('anggota_id') ? 'has-error' : ''}}">
    <label for="anggota_id" class="control-label">{{ 'Nama anggota' }}</label>

    <div class="col-md-12">

        <input list="anggota_id" class="form-control form-control-line" required name="anggota_id">

        <datalist id="anggota_id">
            @foreach ($anggotas as $anggota)
                <option
                    value="{{ $anggota->id }}" {{ (isset($peminjaman->anggota_id) && $peminjaman->anggota_id == $anggota->id) || old('anggota_id') == $anggota->id ? 'selected' : ''}}>{{ "$anggota->nama (id anggota: $anggota->no_identitas)" }}</option>
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
    <label for="user_petugas_id" class="control-label">{{ 'Nama petugas' }}</label>

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
    <label for="tanggal" class="control-label">{{ 'Tanggal Peminjaman' }}</label>

    <div class="col-md-12">
        <input placeholder="tanggal"
               class="form-control form-control-line @error('tanggal') is-invalid @enderror" name="tanggal"
               type="text" id="tanggal"
               value="{{ isset($peminjaman->tanggal) ? $peminjaman->tanggal : (old('tanggal') == "" ? date('d-m-Y') : old('tanggal'))}}"
               required readonly>

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
               value="{{ isset($peminjaman->tanggal_pengembalian) ? $peminjaman->tanggal_pengembalian : (old('tanggal_pengembalian') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('d-m-Y') : old('tanggal_pengembalian')) }}"
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
                @foreach (['Berlangsung', 'Selesai', 'Perpanjangan', 'Tidak Dikembalikan','Diganti'] as $status)
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

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
