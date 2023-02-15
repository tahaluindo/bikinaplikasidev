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


<input type="hidden" name="mapel_id" value="{{ request()->mapel_id ?? $mapel_detail->mapel->id }}">

<div class="form-group {{ $errors->has('guru_id') ? 'has-error' : ''}}">
    <label for="guru_id" class="control-label">{{ ucwords('Guru Id') }}</label>

    <div class="col-md-12">

        <select name="guru_id" class="form-control form-control-line" id="guru_id" required>
            @foreach ($guru as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($mapel_detail->guru_id) && $mapel_detail->guru_id == $optionKey) || old('guru_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('guru_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label>Jenjang</label>
    <select name="jenjang_id" class="form-control form-control-line" id="jenjang_id"
        required="">
        <option value="">--Pilih Jenjang--</option>
        @foreach ($jenjang as $item)
            <option value="{{ $item->id }}"
                @if (old('jenjang_id') == $item->id) selected @endif>
                {{ $item->nama }}</option>
        @endforeach
    </select>
    @error('jenjang_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group {{ $errors->has('kelas_id') ? 'has-error' : ''}}">
    <label for="kelas_id" class="control-label">{{ ucwords('Kelas Id') }}</label>

    <div class="col-md-12">

        <select name="kelas_id" class="form-control form-control-line" id="kelas_id" required>
            @foreach ($kelas as $optionKey => $optionValue)
                <option
                    value="{{ $optionKey }}" {{ (isset($kelas_detail->kelas_id) && $kelas_detail->kelas_id == $optionKey) || old('kelas_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error('kelas_id')
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
