<div class="content pb-0">

    <div class="orders">
        <div class="row">
            <div class="col-xl-6">
                <div class="card px-2">
                    <div class="card-body">
                        <h4 class="box-title">Laporan Pengeluaran </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <form class="form-horizontal form-material"
                                  action="{{ url(route('laporan.pengeluaran.print')) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                
                                
                                <div class="form-group">
                                    <label class="col-md-12">Tanggal Awal</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="{{ date('Y-m-d') }}"
                                               class="form-control form-control-line" id="example-limit"
                                               value='{{ old('tanggal_awal') }}' name='tanggal_awal'
                                               min=1 required>
                                        @error('limit')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Tanggal Akhir</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="{{ date('Y-m-d') }}"
                                               class="form-control form-control-line" id="example-limit"
                                               value='{{ old('tanggal_akhir') }}' name='tanggal_akhir'
                                               min=1 required>
                                        @error('limit')
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
                                            @foreach(['id','jumlah','tanggal','keterangan'] as $field)
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
