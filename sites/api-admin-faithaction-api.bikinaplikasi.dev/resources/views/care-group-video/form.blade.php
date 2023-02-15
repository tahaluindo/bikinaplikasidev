<div class="form-group {{ $errors->has('care_group_kategori_id') ? 'has-error' : ''}}">
    <label for="Status" class="control-label">{{ 'Status' }}</label>
    <select class="form-control form-control-line" name='status'>
        @foreach(['Aktif', 'Tidak Aktif'] as $item)
            <option value="{{ $item }}"
                    @if(old('status')==$item || isset($careGroupVideo->status) && $careGroupVideo->status == $item) selected
                @endif>{{ $item }}</option>
        @endforeach
    </select>
</div>


<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'link' }}</label>

    <input placeholder="link" class="form-control form-control-line @error('link') is-invalid @enderror" name="link"
           type="text" id="link" value="{{ isset($careGroupVideo->link) ? $careGroupVideo->link : old('link') }}" required>

    @error('link')
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