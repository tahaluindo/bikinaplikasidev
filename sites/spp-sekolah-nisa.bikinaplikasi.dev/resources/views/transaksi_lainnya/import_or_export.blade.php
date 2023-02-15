@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Transaksi Lainnya</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Transaksi Lainnya</li>
                            <li class="breadcrumb-item active" aria-current="page">Import / Export</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{-- khusus import --}}
            <div class="col-6">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('transaksi_lainnya.import_excel') }}"
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
                        <form class="form-horizontal form-material" action="{{ route('transaksi_lainnya.export_excel') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Transaksi_lainnya</label>
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="transaksi_lainnya_ids[]">
                                            SEMUA
                                        </label>
                                    </div>
                                    @foreach($transaksi_lainnyas as $index => $transaksi_lainnya)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $transaksi_lainnya->id }}" value="{{ $transaksi_lainnya->id }}"
                                        @if($transaksi_lainnya->id == old("transaksi_lainnya_ids.$index")) checked @endif name="transaksi_lainnya_ids[]">
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
                                            <input class="form-check-input" type="checkbox" value="" name="status[]">
                                            SEMUA
                                        </label>
                                    </div>
                                    @foreach($statuss as $index => $status)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $status }}" value="{{ $status }}"
                                        @if($status == old("status.$index")) checked @endif name="status[]">
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
