@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Laporan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{-- khusus laporan pembayaran santri --}}
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Pembayaran Santri</h4>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('laporan.pembayaran_santri') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Awal</label>
                                <div class="col-md-12">
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_awal') is-invalid @enderror"
                                        value='{{ old('tanggal_awal') == "" ? date('Y-m-d') : old('tanggal_awal') }}'
                                        name='tanggal_awal' id='tanggal_awal'>

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
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_akhir') is-invalid @enderror"
                                        value='{{ old('tanggal_akhir') == "" ? date('Y-m-d') : old('tanggal_akhir') }}'
                                        name='tanggal_akhir' id='tanggal_akhir'>

                                    @error('tanggal_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='kelas_id'>
                                        <option value="">Semua</option>
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" @if(old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='status'>
                                        <option value="">Semua</option>
                                        @foreach($statuss as $status)
                                        <option value="{{ $status }}" @if(old('status')==$status) selected @endif>
                                            {{ $status }}</option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name='print_excel' value='print_excel' type="submit">Print Excel</button>
                                    <button class="text-white btn bg-info" name='print_html' value='print_html' type="submit">Print Html</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- khusus laporan pembayaran infaq --}}
            {{-- <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Pembayaran Infaq</h4>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('laporan.pembayaran_infaq') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Awal</label>
                                <div class="col-md-12">
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_awal') is-invalid @enderror"
                                        value='{{ old('tanggal_awal') == "" ? date('Y-m-d') : old('tanggal_awal') }}'
                                        name='tanggal_awal' id='tanggal_awal'>

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
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_akhir') is-invalid @enderror"
                                        value='{{ old('tanggal_akhir') == "" ? date('Y-m-d') : old('tanggal_akhir') }}'
                                        name='tanggal_akhir' id='tanggal_akhir'>

                                    @error('tanggal_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='kelas_id'>
                                        <option value="">Semua</option>
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" @if(old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='status'>
                                        <option value="">Semua</option>
                                        @foreach($statuss as $status)
                                        <option value="{{ $status }}" @if(old('status')==$status) selected @endif>
                                            {{ $status }}</option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name='print_excel' type="submit">Print Excel</button>
                                    <button class="text-white btn bg-info" name='print_html' type="submit">Print Html</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            {{-- khusus laporan transaksi lainnya --}}
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Transaksi Lainnya</h4>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('laporan.transaksi_lainnya') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Awal</label>
                                <div class="col-md-12">
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_awal') is-invalid @enderror"
                                        value='{{ old('tanggal_awal') == "" ? date('Y-m-d') : old('tanggal_awal') }}'
                                        name='tanggal_awal' id='tanggal_awal'>

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
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_akhir') is-invalid @enderror"
                                        value='{{ old('tanggal_akhir') == "" ? date('Y-m-d') : old('tanggal_akhir') }}'
                                        name='tanggal_akhir' id='tanggal_akhir'>

                                    @error('tanggal_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Jenis</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='jenis'>
                                        <option value="" @if(old('jenis') == "") selected @endif>Semua</option>
                                        <option value="Pengeluaran" @if(old('jenis') == "Pengeluaran") selected @endif>Pengeluaran</option>
                                        <option value="Pemasukan" @if(old('jenis') == "Pemasukan") selected @endif>Pemasukan</option>
                                    </select>

                                    @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='status'>
                                        <option value="">Semua</option>
                                        @foreach($statuss as $status)
                                        <option value="{{ $status }}" @if(old('status')==$status) selected @endif>
                                            {{ $status }}</option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name='print_excel' value='print_excel' type="submit">Print Excel</button>
                                    <button class="text-white btn bg-info" name='print_html' value='print_html' type="submit">Print Html</button>
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
