<div class="page-header">
    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="media-body">
                    <h4 class="page-header-title">Laporan Pembelian</h4>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row panel-wrapper js-grid-wrapper">

        <div class="col-xs-6 col-md-6 js-grid">
            <div class="panel px-1">
                <div class="panel-body " style="display: inline-block; width: 100%;">

                    @if(session()->has("error"))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get("error") }}
                        </div>
                    @elseif(session()->has("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get("success") }}
                        </div>
                    @elseif(session()->has("warning"))
                        <div class="alert alert-warning" role="alert">
                            {{ session()->get("warning") }}
                        </div>
                    @endif

                    <form class="form-horizontal form-material" action="{{ url(route('pembelian.print')) }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Field</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='field' required>
                                    @foreach(['id','barang_id','tahun_ke','jumlah'] as $field)
                                        <option value="{{ $field }}" @if(old('field')==$field)
                                        selected @endif>{{ ucwords(preg_replace("/_/", " ", $field)) }}</option>
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
                                        <option value="{{ $order }}" @if(old('order')==$order)
                                        selected @endif>{{ $order }}</option>
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
                            <label class="col-md-12">Limit</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="{{ $limit }}"
                                       class="form-control form-control-line" id="example-limit"
                                       value='{{ old('limit') == "" ? $limit : old('limit') }}' name='limit'
                                       max='{{ $limit }}'
                                       min=1 required>
                                @error('limit')
                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12" style="margin-top: 15px;">
                                <button name='preview' value='true' class="btn btn-info" type="submit">Preview
                                </button>
                                <button class="btn btn-secondary" type="submit">Print Html</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
