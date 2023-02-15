<div class="form-group {{ $errors->has('jabatan') ? 'has-error' : ''}}">
    <label for="jabatan" class="control-label">{{ 'Jabatan' }}</label>

    <div class="col-md-12">

        <select name="jabatan" class="form-control form-control-line" id="jabatan" required>
            @foreach (['Ketua' => 'Ketua','Sekretaris' => 'Sekretaris','Pengasuh' => 'Pengasuh','Bendahara' => 'Bendahara','Wakil Kepala' => 'Wakil Kepala','Pembangunan' => 'Pembangunan','Pendidikan' => 'Pendidikan','Perlengkapan Inventaris' => 'Perlengkapan Inventaris','kesehatan Dan Kesejahteraan' => 'kesehatan Dan Kesejahteraan','Pengkaderan' => 'Pengkaderan','Keterampilan' => 'Keterampilan'] as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pengurus->jabatan) && $pengurus->jabatan == $optionKey) || old('jabatan') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jabatan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($pengurus->nama) ? $pengurus->nama : old('nama') }}">

        @error('nama')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('jk') ? 'has-error' : ''}}">
    <label for="jk" class="control-label">{{ 'Jk' }}</label>

    <div class="col-md-12">

        <select name="jk" class="form-control form-control-line" id="jk" required>
            @foreach (json_decode('{"Laki - Laki":"Laki - Laki","Perempuan":"Perempuan"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($pengurus->jk) && $pengurus->jk == $optionKey) || old('jk') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jk')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('ttl') ? 'has-error' : ''}}">
    <label for="ttl" class="control-label">{{ 'Ttl' }}</label>

    <div class="col-md-12">
        <input placeholder="ttl" class="form-control form-control-line @error('ttl') is-invalid @enderror" name="ttl"
               type="text" id="ttl" value="{{ isset($pengurus->ttl) ? $pengurus->ttl : old('ttl') }}" required>

        @error('ttl')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    <label for="alamat" class="control-label">{{ 'Alamat' }}</label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
                  required>{{ isset($pengurus->alamat) ? $pengurus->alamat : old('alamat')}}</textarea>

        @error('alamat')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : ''}}">
    <label for="no_hp" class="control-label">{{ 'No Hp' }}</label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror"
               name="no_hp" type="text" id="no_hp"
               value="{{ isset($pengurus->no_hp) ? $pengurus->no_hp : old('no_hp') }}" required>

        @error('no_hp')
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
