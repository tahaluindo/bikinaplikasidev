@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Infaq</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item">Pembayaran Infaq</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <form class="form-horizontal form-material" action="{{ route('pembayaran_infaq.update', $pembayaranInfaq->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="col-md-12">Tahun</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="2020"
                                        class="form-control form-control-line @error('tahun') is-invalid @enderror"
                                        value='{{ old('tahun') == "" ? $pembayaranInfaq->tahun : old('tahun') }}' name='tahun'>

                                    @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nominal</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="100000"
                                        class="form-control form-control-line @error('nominal') is-invalid @enderror"
                                        value='{{ old('nominal') == "" ? $pembayaranInfaq->nominal : old('nominal') }}' name='nominal'>

                                    @error('nominal')
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
                                        name='keterangan'>{{ old('keterangan') == "" ? $pembayaranInfaq->keterangan : old('keterangan') }}</textarea>

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
</div>
@endsection
