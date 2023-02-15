
{{-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ ucwords('Status') }}</label>


    <select progress="status" class="form-control form-control-line" id="status" required>
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
</div> --}}

<div class="form-group {{ $errors->has('progress') ? 'has-error' : ''}}">
    <label for="progress" class="control-label">{{ 'Progress' }}</label>

    <div class="col-md-12">
        <input placeholder="progress" class="form-control form-control-line @error('progress') is-invalid @enderror" name="progress"
               type="text" id="progress" value="{{ isset($siswa->progress) ? $siswa->progress : old('progress') }}" required>

        @error('progress')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit">Simpan</button>
</div>
