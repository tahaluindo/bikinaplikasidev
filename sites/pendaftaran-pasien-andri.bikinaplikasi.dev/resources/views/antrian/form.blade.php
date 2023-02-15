<div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    <label for="nomor" class="control-label">{{ ucwords('Nomor') }}</label>
    <div class="col-md-12">
    <input placeholder="nomor" class="form-control form-control-line @error('nomor') is-invalid @enderror" name="nomor" type="number" id="nomor" value="{{ isset($antrian->nomor) ? $antrian->nomor : old('nomor') }}" >
    
    @error('nomor')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

 </div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ ucwords('Status') }}</label>
    
    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" >
            @foreach (json_decode('[{"Sudah":"Sudah"},{"Belum":"Belum"},{"Di Skip":"Di Skip"},{"Sekarang":"Sekarang"}]', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($antrian->status) && $antrian->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
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
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
