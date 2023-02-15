<style>
    .select-bank {
        z-index: 11;
        cursor: pointer;
    }

    .select-bank:hover {
        background-color: rgba(0, 0, 0, .25);
    }

    .d-none {
        display: none;
    }

    .produk-hover {
        background-color: #3c8dbc !important;
        cursor: pointer !important;
        color: white !important;
    }

    .badge {
        margin-right: 2.5px !important;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-secondary {
        background-color: #6c757d !important;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .bg-dark {
        background-color: #343a40 !important;
    }

    .bg-white {
        background-color: #fff !important;
    }


</style>

<div class="box box-default collapsed-box produk" data-box-header=".box-header-{{ $produk->id }}"
     data-box-body=".box-body-{{ $produk->id }}" data-box-title=".box-title-{{ $produk->id }}">
    <div class="box-header with-border box-header-{{ $produk->id }}">
        <h3 class="box-title box-title-{{ $produk->id }}">
            {{ $produk->nama }}
            @foreach($produk->produk_tags as $produk_tag)
                <span class="{{ $produk_tag->tag->class }}">{{ $produk_tag->tag->name }}</span>
            @endforeach
        </h3>

        {{--        <div class="box-tools pull-right">--}}
        {{--            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
        {{--            </button>--}}
        {{--            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
        {{--        </div>--}}
    </div>

    <!-- /.box-header -->
    <div class="box-body box-body-{{ $produk->id }} d-none">
        <div class="table-responsive">
            <table class="table table-striped">
                @php

                    @endphp

                @foreach(collect($produk)->except(['id', 'nama', 'produk_tags'])->toArray() as $attribute => $value)
                    <tr>
                        <td width="120px">{{ ucwords(str_replace('_', ' ', $attribute)) }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2">


                        <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                                href="#modal-{{ $produk['id'] }}">
                            <i class="fa fa-cart-plus"></i>
                            Pesan Sekarang
                        </button>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="modal-{{ $produk['id'] }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Metode Pembayaran (Tidak bisa diubah)</h4>
            </div>
            <div class="modal-body">

                <div class="row justify-content-center mb-4 radio-group" style="margin: 5px !important;">
                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="MYBVA" data-form="form-{{ $produk['id'] }}">
                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/ZT91lrOEad1582929126.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="PERMATAVA"
                         data-form="form-{{ $produk['id'] }}">

                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/szezRhAALB1583408731.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="BNIVA" data-form="form-{{ $produk['id'] }}">

                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/n22Qsh8jMa1583433577.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="BRIVA" data-form="form-{{ $produk['id'] }}">

                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/8WQ3APST5s1579461828.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="MANDIRIVA"
                         data-form="form-{{ $produk['id'] }}">

                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/T9Z012UE331583531536.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="BCAVA" data-form="form-{{ $produk['id'] }}">

                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/ytBKvaleGy1605201833.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5 select-bank" data-value="SMSVA" data-form="form-{{ $produk['id'] }}">

                        <div class='radio selected mx-auto' data-value="dk">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/KHcqcmqVFQ1607091889.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5">

                        <div class='radio selected mx-auto select-bank' data-value="ALFAMART"
                             data-form="form-{{ $produk['id'] }}">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/jiGZMKp2RD1583433506.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <div class="col-sm-4 m-3 col-5">

                        <div class='radio selected mx-auto select-bank' data-value="QRIS"
                             data-form="form-{{ $produk['id'] }}">
                            <img class="fit-image"
                                 src="https://payment.tripay.co.id/images/payment-channel/BpE4BPVyIw1605597490.png"
                                 width="200px" height="60px">
                        </div>
                    </div>

                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.pesanan.store') }}?id={{ $produk['id'] }}" method="post"
                      style="display: inline;" id="form-{{ $produk['id'] }}">

                    <div class="form-group text-left">
                        <div class="row">
                            <div class="col-xs-10">
                                <label for="kode">Catatan (Metode, judul, dll..)</label>
                                <textarea name="catatan" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-left">
                        <div class="row">
                            <div class="col-xs-10">
                                <label for="kode">Kode Voucher (Jika ada)</label>
                                <input type="text" name="kode_voucher"
                                       class="form-control kode-voucher-{{ $produk['id'] }}">
                            </div>

                            <div class="col-xs-12" style="margin-top: 25px !important;">
                                <button class="btn btn-info btn-cek-voucher mr-5" type="button"
                                        data-kode-voucher=".kode-voucher-{{ $produk['id'] }}"
                                        data-img-loading=".img-loading-{{ $produk['id'] }}"
                                        data-voucher-ditemukan=".voucher-ditemukan-{{ $produk['id'] }}"
                                        data-voucher-tidak-ditemukan=".voucher-tidak-ditemukan-{{ $produk['id'] }}">
                                    Cek
                                </button>

                                <img class="ml-2 img-loading-{{ $produk['id'] }}"
                                     src="{{ url('') }}/img/loading.gif"
                                     alt="" style="display: none;">
                                <span class="text-success voucher-ditemukan-{{ $produk['id'] }}"></span>
                                <span class="text-danger voucher-tidak-ditemukan-{{ $produk['id'] }}"></span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="method" value="" id="method-{{ $produk['id'] }}" class="method">
                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-lanjutkan"
                            data-form="form-{{ $produk['id'] }}">
                        Lanjutkan >>>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>