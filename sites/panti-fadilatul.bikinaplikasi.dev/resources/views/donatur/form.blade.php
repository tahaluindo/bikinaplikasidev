<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($donatur->nama) ? $donatur->nama : old('nama') }}" required>

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror" name="no_hp"
               type="text" id="no_hp" value="{{ isset($donatur->no_hp) ? $donatur->no_hp : old('no_hp') }}" required>

        @error('no_hp')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('nama_pemilik_rekening') ? 'has-error' : ''}}">
    <label for="nama_pemilik_rekening" class="control-label">{{ 'Nama Pemilik Rekening' }}</label>

    <div class="col-md-12">
        <input placeholder="nama_pemilik_rekening"
               class="form-control form-control-line @error('nama_pemilik_rekening') is-invalid @enderror"
               name="nama_pemilik_rekening" type="text" id="nama_pemilik_rekening"
               value="{{ isset($donatur->nama_pemilik_rekening) ? $donatur->nama_pemilik_rekening : old('nama_pemilik_rekening') }}"
               required>

        @error('nama_pemilik_rekening')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>

    <div class="col-md-12">
        <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror"
               name="jumlah" type="number" id="jumlah"
               value="{{ isset($donatur->jumlah) ? $donatur->jumlah : old('jumlah') }}" required>

        @error('jumlah')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'Tanggal' }}</label>

    <div class="col-md-12">
        <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror"
               name="tanggal" type="date" id="tanggal"
               value="{{ isset($donatur->tanggal) ? $donatur->tanggal : (old('tanggal') != "" ? old('tanggal') : date('Y-m-d')) }}" required>

        @error('tanggal')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('pesan') ? 'has-error' : ''}}">
    <label for="pesan" class="control-label">{{ 'Pesan' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="pesan" type="textarea" id="pesan" placeholder="pesan"
                  required>{{ isset($donatur->pesan) ? $donatur->pesan : old('pesan')}}</textarea>

        @error('pesan')
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
