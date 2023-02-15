<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    Dalam pemilihan kriteria mana yang lebih penting bagi responden dari perbandingan kriteria-kriteria dibawah dalam
    penggunaan Aplikasi Transportasi Roda Dua berbasis Online ?
</div>

@for($i = 1; $i <= 7; $i++)
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">

        <div class="col-md-12">
            <select name="kriteria_id[{{$i}}]" class="form-control form-control-line" id="kriteria_id[{{$i}}]" required>
                <option
                    value="">-- PILIH RANKING {{ $i }} --
                </option>

                @foreach ($kriteria as $item)
                    <option
                        value="{{ $item->id }}" {{ old("kriteria_id.$i") == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                @endforeach
            </select>

            @error("kriteria_id.$i")
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@endfor


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
