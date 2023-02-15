<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="control-label">{{ ucwords('Nama') }}</label>
    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama"
            type="text" id="nama" value="{{ isset($lapangan->nama) ? $lapangan->nama : old('nama') }}" required>

        @error('nama')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
