@extends("layouts.admin-lte.app")

@section('page') Laporan @endsection

@section("content")
    <div class="row">
        <div class="col-sm-4">

            <div class="card">
                <div class="card-header">
                    <h4>Laporan Siswa</h4>
                </div>

                <div class="card-body">
                    <form class="form-horizontal form-material"
                          action="{{ route('laporan.siswa') }}"
                          method="get" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Awal</label>
                            <div class="col-md-12">
                                <input type="date"
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
                                <input type="date"
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
                                        <option value="{{ $kelas->id }}"
                                                @if(old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
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
                                        <option value="{{ $status }}"
                                                @if(old('status')==$status) selected @endif>
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
                                <button class="text-white btn bg-info" name='print_html' value='print_html'
                                        type="submit">Print Html
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Guru</h4>
                </div>

                <div class="card-body">
                    <form class="form-horizontal form-material"
                          action="{{ route('laporan.guru') }}"
                          method="get" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Awal</label>
                            <div class="col-md-12">
                                <input type="date"
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
                                <input type="date"
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
                            <label class="col-md-12">Status</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='status'>
                                    <option value="">Semua</option>
                                    @foreach($statuss as $status)
                                        <option value="{{ $status }}"
                                                @if(old('status')==$status) selected @endif>
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
                                <button class="text-white btn bg-info" name='print_html' value='print_html'
                                        type="submit">Print Html
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Kelas</h4>
                </div>

                <div class="card-body">
                    <form class="form-horizontal form-material"
                          action="{{ route('laporan.kelas') }}"
                          method="get" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="text-white btn bg-info" name='print_html' value='print_html'
                                        type="submit">Print Html
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
