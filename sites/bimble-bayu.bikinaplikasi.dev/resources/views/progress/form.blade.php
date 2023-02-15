<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>
    $(document).ready(function() {
        var kelas_selector = $('#kelas_id')
        var kelas_selector_option = $('#kelas_id option');
        $(document).on('change', '#jenjang_id', function(e) {
            var nama_jenjang = $('#jenjang_id').find("option:selected").text().trim();

            kelas_selector.empty();
            if (nama_jenjang == "SD") {

                let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                    return (item.label == "I" || item.label == "II" ||
                        item.label == "III" || item.label == "IV" || item.label ==
                        "V" || item.label == "VI")
                })

                $.each(kelas_selector_filtered, (index, item) => {
                    kelas_selector.append(item.outerHTML);
                });
            } else if (nama_jenjang == "SMP") {
                let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                    return (item.label == "VII" || item.label ==
                        "VIII" || item.label == "IX")
                })

                $.each(kelas_selector_filtered, (index, item) => {
                    kelas_selector.append(item.outerHTML);
                });
            } else if (nama_jenjang == "SMA") {
                let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                    return (item.label == "X" || item.label == "XI" ||
                        item.label == "XII")
                })

                $.each(kelas_selector_filtered, (index, item) => {
                    kelas_selector.append(item.outerHTML);
                });
            }
        });
    });
</script>






<div class="form-group {{ $errors->has('jenjang_id') ? 'has-error' : ''}}">
    <label for="jenjang_id" class="control-label">{{ ucwords('Jenjang Id') }}</label>

    <div class="col-md-12">

        <select name="jenjang_id" class="form-control form-control-line" id="jenjang_id" required>
            @foreach ($jenjang as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kelasdetail->jenjang_id) && $kelasdetail->jenjang_id == $optionKey) || old('jenjang_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('jenjang_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('kelas_id') ? 'has-error' : ''}}">
    <label for="kelas_id" class="control-label">{{ ucwords('Kelas Id') }}</label>

    <div class="col-md-12">

        <select name="kelas_id" class="form-control form-control-line" id="kelas_id" required>
            @foreach ($kelas as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kelasdetail->kelas_id) && $kelasdetail->kelas_id == $optionKey) || old('kelas_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kelas_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

{{-- <div class="form-group {{ $errors->has('angkatan') ? 'has-error' : ''}}">
    <label for="angkatan" class="control-label">{{ ucwords('Angkatan') }}</label>
    <div class="col-md-12">
        <input placeholder="angkatan" class="form-control form-control-line @error('angkatan') is-invalid @enderror"
               name="angkatan"
               type="text" id="angkatan"
               value="{{ isset($progress->angkatan) ? $progress->angkatan : (old('angkatan') != "" ? old('angkatan') : $angkatan) }}"
               required readonly>

        @error('angkatan')
        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div> --}}

<div class="form-group {{ $errors->has('mapel_id') ? 'has-error' : ''}}">
    <label for="mapel_id" class="control-label">{{ ucwords('Mapel Id') }}</label>

    <div class="col-md-12">

        <select name="mapel_id" class="form-control form-control-line" id="mapel_id" required>
            @foreach ($mapel as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kelasdetail->mapel_id) && $kelasdetail->mapel_id == $optionKey) || old('mapel_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('mapel_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

</div>

<div class="form-group {{ $errors->has('progress') ? 'has-error' : ''}}">
    <label for="progress" class="control-label">{{ ucwords('Progress') }}</label>
    
    <input class="form-control form-control-line @error('progress') is-invalid @enderror" name="progress" id="progress" value="{{ isset($progress->progress) ? $progress->progress : old('progress') }}">

    @error('progress')
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
