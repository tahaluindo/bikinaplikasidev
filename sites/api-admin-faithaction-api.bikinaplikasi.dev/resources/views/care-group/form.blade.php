<div class="form-group {{ $errors->has('hari') ? 'has-error' : ''}}">
    <label for="Care Group Lokasi" class="control-label">{{ 'Care Group Lokasi' }}</label>
    <select class="form-control form-control-line" name='care_group_lokasi_id'>
        @foreach($careGroupLokasi as $item)
            <option value="{{ $item->id }}"
                    @if(old('care_group_lokasi_id')==$item->nama || isset($careGroup->care_group_lokasi_id) && $careGroup->care_group_lokasi_id == $item->care_group_lokasi_id) selected
                @endif>{{ $item->nama }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('care_group_kategori_id') ? 'has-error' : ''}}">
    <label for="Care Group Kategori" class="control-label">{{ 'Care Group Kategori' }}</label>
    <select class="form-control form-control-line" name='care_group_kategori_id'>
        @foreach($careGroupKategori as $item)
            <option value="{{ $item->id }}"
                    @if(old('care_group_kategori_id')==$item->nama || isset($careGroup->care_group_kategori_id) && $careGroup->care_group_kategori_id == $item->care_group_kategori_id) selected
                @endif>{{ $item->nama }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'nama' }}</label>

    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
           type="text" id="nama" value="{{ isset($careGroup->nama) ? $careGroup->nama : old('nama') }}" required>

    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('tipePertemuan') ? 'has-error' : ''}}">
    <label for="tipePertemuan" class="control-label">{{ 'tipePertemuan' }}</label>
    <select class="form-control form-control-line" name='tipePertemuan'>
        @foreach(['Onsite', 'Remote'] as $tipePertemuan)
            <option value="{{ $tipePertemuan }}"
                    @if(old('tipePertemuan')==$tipePertemuan || isset($careGroup->tipePertemuan) && $careGroup->tipePertemuan == $tipePertemuan) selected
                @endif>{{ $tipePertemuan }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('hari') ? 'has-error' : ''}}">
    <label for="hari" class="control-label">{{ 'hari' }}</label>
    <select class="form-control form-control-line" name='hari'>
        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'] as $hari)
            <option value="{{ $hari }}"
                    @if(old('hari')==$hari || isset($careGroup->hari) && $careGroup->hari == $hari) selected
                @endif>{{ $hari }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('dariJam') ? 'has-error' : ''}}">
    <label for="dariJam" class="control-label">{{ 'dariJam' }}</label>

    <input placeholder="dariJam" class="form-control form-control-line @error('dariJam') is-invalid @enderror" name="dariJam"
           type="text" id="dariJam" value="{{ isset($careGroup->dariJam) ? $careGroup->dariJam : old('dariJam') }}" required>

    @error('dariJam')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group {{ $errors->has('sampaiJam') ? 'has-error' : ''}}">
    <label for="sampaiJam" class="control-label">{{ 'sampaiJam' }}</label>

    <input placeholder="sampaiJam" class="form-control form-control-line @error('sampaiJam') is-invalid @enderror" name="sampaiJam"
           type="text" id="sampaiJam" value="{{ isset($careGroup->sampaiJam) ? $careGroup->sampaiJam : old('sampaiJam') }}" required>

    @error('sampaiJam')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>

<script>
    var q = "";
    var placeholder = "";
    var urlSearch = "";
</script>