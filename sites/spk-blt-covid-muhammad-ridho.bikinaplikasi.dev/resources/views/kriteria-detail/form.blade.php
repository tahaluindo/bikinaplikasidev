<input type="hidden" name="kriteria_id" value="{{ request()->kriteria_id }}">

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Keterangan' }}</label>

    <div class="col-md-12">
        <input placeholder="keterangan" class="form-control form-control-line @error('keterangan') is-invalid @enderror" name="keterangan"
            type="text" id="keterangan" value="{{ isset($kriteria_detail->keterangan) ? $kriteria_detail->keterangan : old('keterangan')}}" required>

        @error('keterangan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('urutan_prioritas') ? 'has-error' : ''}}">
    <label for="urutan_prioritas" class="control-label">{{ 'Urutan Prioritas' }}</label>

    <div class="col-md-12">
        <input placeholder="urutan_prioritas" class="form-control form-control-line @error('urutan_prioritas') is-invalid @enderror" name="urutan_prioritas"
            type="number" min="1" id="urutan_prioritas" value="{{ isset($kriteria_detail->urutan_prioritas) ? $kriteria_detail->urutan_prioritas : old('urutan_prioritas')}}" required>

        @error('urutan_prioritas')
        <span class="invalid-feedback" role="alert">
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
