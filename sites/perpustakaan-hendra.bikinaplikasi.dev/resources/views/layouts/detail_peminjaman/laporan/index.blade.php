<div class='row'>
    <div class='col-md-12'>
        <form class="form-horizontal form-material" action="{{ url(route('detail_peminjaman.print')) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="col-md-12">Status</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='status'>
                        <option value=""></option>
                        @foreach(['Dikembalikan', 'Belum Dikembalikan'] as $status)
                        <option value="{{ $status }}" @if(old('status')==$status) selected @endif>
                            {{ ucwords(preg_replace("/_/", " ", $status)) }}</option>
                        @endforeach
                    </select>

                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Field</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='field' required>
                        @foreach(['id','peminjaman_id','buku_id','jumlah','status'] as $field)
                        <option value="{{ $field }}" @if(old('field')==$field) selected @endif>
                            {{ ucwords(preg_replace("/_/", " ", $field)) }}</option>
                        @endforeach
                    </select>

                    @error('field')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Order</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='order' required>
                        @foreach(['ASC', 'DESC'] as $order)
                        <option value="{{ $order }}" @if(old('order')==$order) selected @endif>{{ $order }}</option>
                        @endforeach
                    </select>

                    @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
                    <button class="btn btn-success" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>
</div>
