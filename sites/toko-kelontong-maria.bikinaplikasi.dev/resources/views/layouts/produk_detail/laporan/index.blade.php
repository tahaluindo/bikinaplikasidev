<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header" style="margin-bottom: 0px;">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('') }}"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="#!">{{ ucwords(str_replace("_", " ", request()->type)) }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xl-12 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>{{ ucwords(str_replace("_", " ", request()->type)) }}</h5>
                                    </div>
                                    <div class="card-body px-3 py-3">
                                        <div class="table-stats order-table ov-h table-responsive"
                                             style="padding-left: 28px; padding-top: 20px;">

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

                                            <form class="form-horizontal form-material"
                                                  action="{{ url(route('produk-detail.print')) }}"
                                                  method="post" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="type" value="{{ request()->type }}">
                                                
                                                <div class="form-group">
                                                    <label class="col-md-12">Tanggal Awal</label>
                                                    <div class="col-md-12">

                                                        <input type="date" placeholder="{{ now()->toDateString() }}"
                                                               class="form-control form-control-line"
                                                               id="example-limit"
                                                               min=1 required name="tanggal_awal">

                                                        @error('tanggal_awal')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12">Tanggal Akhir</label>
                                                    <div class="col-md-12">

                                                        <input type="date" placeholder="{{ now()->toDateString() }}"
                                                               class="form-control form-control-line"
                                                               id="example-limit"
                                                               min=1 required name="tanggal_akhir">

                                                        @error('tanggal_awal')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12">Field</label>
                                                    <div class="col-md-12">
                                                        <select class="form-control form-control-line" name='field'
                                                                required>
                                                            @foreach(['id','produk_id','jumlah','harga_beli','harga_jual','tanggal'] as $field)
                                                                <option value="{{ $field }}"
                                                                        @if(old('field')==$field)
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
                                                        <select class="form-control form-control-line" name='order'
                                                                required>
                                                            @foreach(['ASC', 'DESC'] as $order)
                                                                <option value="{{ $order }}"
                                                                        @if(old('order')==$order)
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
                                                               class="form-control form-control-line"
                                                               id="example-limit"
                                                               value='{{ old('limit') == "" ? $limit : old('limit') }}'
                                                               name='limit' max='{{ $limit }}'
                                                               min=1 required>
                                                        @error('limit')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button name='preview' value='true' class="btn btn-info"
                                                                type="submit">Preview
                                                        </button>
                                                        <button class="btn btn-primary" type="submit">Print Html
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
