<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Pesanan</h4>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <div class="card px-1">
                        <div class="card-body">
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

                            <form class="form-horizontal form-material" action="{{ url(route('pesanan.print')) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Tanggal Mulai</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="{{ $limit }}"
                                               class="form-control form-control-line" id="example-limit"
                                               value='{{ old('tanggal_mulai') == "" ? date("Y-m-d") : old('tanggal_mulai') }}' name='tanggal_mulai'
                                               min=1 required>
                                        @error('tanggal_mulai')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Tanggal Akhir</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="{{ $limit }}"
                                               class="form-control form-control-line" id="example-limit"
                                               value='{{ old('tanggal_akhir') == "" ? date("Y-m-d") : old('tanggal_akhir') }}' name='tanggal_akhir'
                                               min=1 required>
                                        @error('tanggal_akhir')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-md-12">Field</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" name='field' required>
                                            @foreach(['id','no','pelanggan_id','dipesan_pada','diambil_pada','status','admin','diskon'] as $field)
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
                                    <div class="col-sm-12">
                                        <button name='preview' value='true' class="btn btn-info" type="submit">Preview
                                        </button>
                                        <button class="btn btn-primary" type="submit">Print Html</button>
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

