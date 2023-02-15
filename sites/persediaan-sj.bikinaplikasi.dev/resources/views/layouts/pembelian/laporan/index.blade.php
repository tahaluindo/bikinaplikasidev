<div class="page">

    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12 col-xl-12">
                <!-- Panel Web Designer -->
                <div class="card card-shadow">
                    <div class="card-block bg-white p-40">

                        <div class='row'>
                            <div class='col-md-6'>
                                <form class="form-horizontal form-material" action="{{ url(route('pembelian.print')) }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Tanggal Awal</label>
                                        <div class="col-md-12">
                                            <input type="date"
                                                   class="form-control form-control-line" id="example-limit"
                                                   value='{{ old('tanggal_awal') != "" ? old('tanggal_awal') : now()->addDays(-1)->toDateString() }}'
                                                   name='tanggal_awal'
                                                   min=1 required>
                                            @error('tanggal_awal')
                                            <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Tanggal Akhir</label>
                                        <div class="col-md-12">
                                            <input type="date" name="tanggal_akhir"
                                                   class="form-control form-control-line" id="example-tanggal"
                                                   value='{{ old('tanggal_akhir') != "" ? old('tanggal_akhir') : now()->addDays(1)->toDateString() }}'
                                                   required>
                                            @error('tanggal')
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
                                                @foreach(['id','pemasok_id','status','catatan','created_at','updated_at'] as $field)
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
                                            <button name='preview' value='true' class="btn btn-info" type="submit">
                                                Preview
                                            </button>
                                            <button class="btn btn-primary" type="submit">Print Html</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Web Designer -->
            </div>
        </div>
    </div>
</div>