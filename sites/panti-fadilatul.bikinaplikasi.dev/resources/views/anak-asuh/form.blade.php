<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
               type="text" id="nama" value="{{ isset($anak_asuh->nama) ? $anak_asuh->nama : old('nama') }}" required>

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
            @foreach (json_decode('{"Laki - Laki":"Laki - Laki","Perempuan":"perempuan"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($anak_asuh->jk) && $anak_asuh->jk == $optionKey) || old('jk') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
               type="text" id="ttl" value="{{ isset($anak_asuh->ttl) ? $anak_asuh->ttl : old('ttl') }}" required>

        @error('ttl')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="pendidikan" class="control-label">{{ 'Pendidikan' }}</label>

    <div class="col-md-12">

        <select name="pendidikan" class="form-control form-control-line" id="pendidikan" required>
            @foreach (array('TK' => 'TK', 'SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA', 'D3' => 'D3', 'S1' => 'S1') as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($anak_asuh->pendidikan) && $anak_asuh->pendidikan == $optionKey) || old('pendidikan') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('pendidikan')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (json_decode('{"Yatim":"Yatim","Piatu":"Piatu","Yatim Piatu":"Yatim Piatu","Dhuafa":"Dhuafa"}', true) as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($anak_asuh->status) && $anak_asuh->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
        <button class="btn btn-success" type="submit" >Simpan</button>
    </div>
</div>
