<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="Jurusan" class="control-label">{{ ucwords('Jurusan') }}</label>

    <select name="jurusan_id" class="form-control form-control-line" id="jurusan_id"
            required>
        @foreach ($jurusan->pluck('nama', 'id') as $optionKey => $optionValue)
            <option
                value="{{ $optionKey }}" {{ (isset($siswa->jurusan_id) && $siswa->jurusan_id == $optionKey) || old('jurusan_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>

    @error('jurusan_id')
    <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ ucwords('Nama') }}</label>

    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
           type="text" id="nama" value="{{ isset($siswa->nama) ? $siswa->nama : old('nama') }}" required>

    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


</div>

<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
    <label for="jenis_kelamin" class="control-label">{{ ucwords('Jenis Kelamin') }}</label>


    <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin" required>
        @foreach (["Laki - Laki" => "Laki - Laki", "Perempuan" => "Perempuan"] as $optionKey => $optionValue)
            <option
                value="{{ $optionKey }}" {{ (isset($siswa->jenis_kelamin) && $siswa->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>

    @error('jenis_kelamin')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ ucwords('Alamat') }}</label>

    <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
              required>{{ isset($siswa->alamat) ? $siswa->alamat : old('alamat')}}</textarea>

    @error('alamat')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ ucwords('No Hp') }}</label>

    <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror"
           name="no_hp" type="text" id="no_hp" value="{{ isset($siswa->no_hp) ? $siswa->no_hp : old('no_hp') }}"
           required>

    @error('no_hp')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


</div>

<div class="form-group {{ $errors->has('berkas') ? 'has-error' : ''}}">
    <label for="berkas" class="control-label">{{ ucwords('Berkas') }}</label>

    <input placeholder="berkas" class="form-control form-control-line @error('berkas') is-invalid @enderror"
           name="berkas" type="file" id="berkas"
           value="{{ isset($siswa->berkas) ? $siswa->berkas : old('berkas') }}">

    @error('berkas')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ ucwords('Status') }}</label>


    <select name="status" class="form-control form-control-line" id="status" required>
        @foreach (["Baru Mendaftar" => "Baru Mendaftar", "Pendaftaran Diterima" => "Pendaftaran Diterima", "Ditolak" => "Ditolak"] as $optionKey => $optionValue)
            <option
                value="{{ $optionKey }}" {{ (isset($siswa->status) && $siswa->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>

    @error('status')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit">Simpan</button>
</div>
