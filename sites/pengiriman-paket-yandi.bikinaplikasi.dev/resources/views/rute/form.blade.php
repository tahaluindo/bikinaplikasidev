
<div class="form-group {{ $errors->has('dari') ? 'has-error' : ''}}">
    <label for="dari" class="control-label">{{ 'Dari' }}</label>

    <div class="col-md-12">

        <input list="dari" class="form-control form-control-line dari" required name="dari" value="{{ isset($rute->dari) ? $rute->dari : old('dari') }}">

        <datalist id="dari">
            <option value=""></option>
            @foreach ($lokasis as $lokasi)
                <option
                    value="{{ $lokasi->id }}" {{ (isset($rute->dari) && $rute->dari == $lokasi->id) || old('dari') == $lokasi->id ? 'selected' : ''}}>{{ $lokasi->nama }}</option>
            @endforeach
        </datalist>

        @error('dari')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group {{ $errors->has('ke') ? 'has-error' : ''}}">
    <label for="ke" class="control-label">{{ 'Ke' }}</label>

    <div class="col-md-12">

        <input list="ke" class="form-control form-control-line ke" required name="ke" value="{{ isset($rute->ke) ? $rute->ke : old('ke') }}">

        <datalist id="ke">
            <option value=""></option>
            @foreach ($lokasis as $lokasi)
                <option
                    value="{{ $lokasi->id }}" {{ (isset($lokasi->ke) && $rute->ke == $lokasi->id) || old('ke') == $lokasi->id ? 'selected' : ''}}>{{ $lokasi->nama }}</option>
            @endforeach
        </datalist>

        @error('ke')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group {{ $errors->has('biaya') ? 'has-error' : ''}}">
    <label for="biaya" class="control-label">{{ 'Biaya' }}</label>

    <div class="col-md-12">
        <input placeholder="biaya" class="biaya form-control form-control-line @error('biaya') is-invalid @enderror"
               name="biaya" type="text" min="0" id="biaya"
               value="{{ isset($rute->biaya) ? $rute->biaya : (old('biaya') == "" ? "" : old('biaya')) }}"
               required>

        @error('biaya')
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


