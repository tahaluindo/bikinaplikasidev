@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Detail Peminjaman</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <form class="form-horizontal form-material"
                                  action="{{ route('transaksi_lainnya.import_excel') }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="col-md-12">File Excel</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line" name='file_excel'
                                               value="{{ old('file_excel') }}">

                                        @if($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Import</button>
                                        <a href='{{ route('transaksi_lainnya.download_format_import_excel') }}'
                                           class="text-white btn bg-info" type="submit">Download Format</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- khusus export --}}
                <div class="col-6">
                    <div class="card">

                        <div class="card-body">
                            <form class="form-horizontal form-material"
                                  action="{{ route('transaksi_lainnya.export_excel') }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="col-md-12">Transaksi_lainnya</label>
                                    <div class="col-md-12">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       name="transaksi_lainnya_ids[]">
                                                SEMUA
                                            </label>
                                        </div>
                                        @foreach($transaksi_lainnyas as $index => $transaksi_lainnya)
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox-{{ $transaksi_lainnya->id }}"
                                                           value="{{ $transaksi_lainnya->id }}"
                                                           @if($transaksi_lainnya->id == old("transaksi_lainnya_ids.$index")) checked
                                                           @endif name="transaksi_lainnya_ids[]">
                                                    {{ $transaksi_lainnya->nama }}
                                                </label>
                                            </div>
                                        @endforeach

                                        @error('transaksi_lainnya_ids')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Status</label>
                                    <div class="col-md-12">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       name="status[]">
                                                SEMUA
                                            </label>
                                        </div>
                                        @foreach($statuss as $index => $status)
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox-{{ $status }}" value="{{ $status }}"
                                                           @if($status == old("status.$index")) checked
                                                           @endif name="status[]">
                                                    {{ $status }}
                                                </label>
                                            </div>
                                        @endforeach

                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Limit</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="0"
                                               class="form-control form-control-line @error('limit') is-invalid @enderror"
                                               value='{{ old('limit') == "" ? 100 : old('limit')  }}'
                                               name='limit'>

                                        @error('limit')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Export</button>
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
