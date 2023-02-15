@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Santri</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Pembayaran Santri</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material"
                            action="{{ route('pembayaran_santri.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Bulan Pembayaran</label>
                                <div class="col-md-12">
                                    @foreach($pembayaran_santri_bulans as $index => $pembayaran_santri_bulan)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $pembayaran_santri_bulan }}" value="{{ $pembayaran_santri_bulan }}"
                                        @if($pembayaran_santri_bulan == old("pembayaran_santri_bulan.$index")) checked @endif name="pembayaran_santri_bulans[]">
                                        {{ $pembayaran_santri_bulan }}
                                      </label>
                                    </div>
                                    @endforeach

                                    @error('pembayaran_santri_bulan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tahun</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="2020"
                                        class="form-control form-control-line @error('tahun') is-invalid @enderror"
                                        value='{{ old('tahun') }}' name='tahun'>

                                    @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nominal Spp Default</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="100000"
                                        class="form-control form-control-line @error('nominal_spp_default') is-invalid @enderror"
                                        value='{{ old('nominal_spp_default') }}' name='nominal_spp_default'>

                                    @error('nominal_spp_default')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nominal Uang Makan Default</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="100000"
                                        class="form-control form-control-line @error('nominal_uang_makan_default') is-invalid @enderror"
                                        value='{{ old('nominal_uang_makan_default') }}' name='nominal_uang_makan_default'>

                                    @error('nominal_uang_makan_default')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Keterangan</label>
                                <div class="col-md-12">
                                    <textarea id='editor-1' style="height: 130px !important;"
                                        class="form-control form-control-line @error('keterangan') is-invalid @enderror"
                                        name='keterangan'>{{ old('keterangan') }}</textarea>

                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
