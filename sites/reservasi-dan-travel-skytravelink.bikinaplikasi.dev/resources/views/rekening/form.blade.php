<div class="form-group {{ $errors->has('nama_penyedia') ? 'has-error' : ''}}">
    <label for="nama_penyedia" class="control-label">{{ 'Nama Penyedia' }}</label>

    <div class="col-md-12">
        <input placeholder="nama_penyedia" class="nama_penyedia form-control form-control-line @error('nama_penyedia') is-invalid @enderror"
               name="nama_penyedia" type="text" min="0" id="nama_penyedia"
               value="{{ isset($rekening->nama_penyedia) ? $rekening->nama_penyedia : (old('nama_penyedia') == "" ? "" : old('nama_penyedia')) }}"
               required>

        @error('nama_penyedia')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('atas_nama') ? 'has-error' : ''}}">
    <label for="atas_nama" class="control-label">{{ 'Atas Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="atas_nama" class="atas_nama form-control form-control-line @error('atas_nama') is-invalid @enderror"
               name="atas_nama" type="text" min="0" id="atas_nama"
               value="{{ isset($rekening->atas_nama) ? $rekening->atas_nama : (old('atas_nama') == "" ? "" : old('atas_nama')) }}"
               required>

        @error('atas_nama')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('nomor_rekening') ? 'has-error' : ''}}">
    <label for="nomor_rekening" class="control-label">{{ 'Nomor Rekening' }}</label>

    <div class="col-md-12">
        <input placeholder="nomor_rekening" class="nomor_rekening form-control form-control-line @error('nomor_rekening') is-invalid @enderror"
               name="nomor_rekening" type="number" min="0" id="nomor_rekening"
               value="{{ isset($rekening->nomor_rekening) ? $rekening->nomor_rekening : (old('nomor_rekening') == "" ? "" : old('nomor_rekening')) }}"
               required>

        @error('nomor_rekening')
        <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">
        <select name="status" class="form-control form-control-line" id="status">
            @foreach (['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($rekening->status) && $rekening->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


