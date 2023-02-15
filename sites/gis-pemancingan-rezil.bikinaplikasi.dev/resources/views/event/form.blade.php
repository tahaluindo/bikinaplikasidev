<div class="form-group {{ $errors->has('map') ? 'has-error' : ''}}">
    <label for="map_id" class="control-label">{{ 'Map' }}</label>

    <select name="map_id" class="form-control form-control-line" id="map_id" required>
        @foreach ($map as $optionKey => $optionValue)
            <option value="{{ $optionKey }}"
                {{ (isset($event->map) == $optionKey) || old('map') == $optionKey ? 'selected' : ''}}>
                {{ $optionValue }}</option>
        @endforeach
    </select>

    @error('map_id')
    <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="nama" class="control-label">{{ 'Nama' }}</label>

    <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
           type="text" id="nama" value="{{ isset($event->nama) ? $event->nama : old('nama') }}" required>

    @error('nama')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    <label for="deskripsi" class="control-label">{{ ucwords('Deskripsi') }}</label>

    <textarea class="form-control" rows="5" name="deskripsi" type="textarea" id="editor-0"
              placeholder="deskripsi"
    >{{ isset($event->deskripsi) ? $event->deskripsi : old('deskripsi')}}</textarea>

    @error('deskripsi')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="dari_tanggal" class="control-label">{{ 'Dari Tanggal' }}</label>

    <input placeholder="dari_tanggal"
           class="form-control form-control-line @error('dari_tanggal') is-invalid @enderror" name="dari_tanggal"
           type="date" id="dari_tanggal"
           value="{{ isset($event->dari_tanggal) ? $event->dari_tanggal : old('dari_tanggal') }}" required>

    @error('dari_tanggal')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    <label for="sampai_tanggal" class="control-label">{{ 'Sampai Tanggal' }}</label>

    <input placeholder="sampai_tanggal"
           class="form-control form-control-line @error('sampai_tanggal') is-invalid @enderror"
           name="sampai_tanggal"
           type="date" id="sampai_tanggal"
           value="{{ isset($event->sampai_tanggal) ? $event->sampai_tanggal : old('sampai_tanggal') }}" required>

    @error('sampai_tanggal')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


</div>

@if(in_array(auth()->user()->level, ['Admin']))
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="control-label">{{ 'status' }}</label>

        <select name="status" class="form-control form-control-line" id="status" required>
            @foreach (['Berlangsung', 'Selesai', 'Pending', 'Ditolak'] as $optionKey => $optionValue)
                <option value="{{ $optionValue }}"
                    {{ (isset($event->status) == $optionValue) || old('status') == $optionValue ? 'selected' : ''}}>
                    {{ $optionValue }}</option>
            @endforeach
        </select>

        @error('status')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
@endif

<div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
    <label for="gambar" class="control-label">{{ 'gambar' }}</label>

    <input placeholder="gambar" class="form-control form-control-line @error('gambar') is-invalid @enderror"
           name="gambar"
           type="file" id="gambar" value="{{ isset($event->gambar) ? $event->gambar : old('gambar') }}">

    @error('gambar')
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
