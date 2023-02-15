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
                            <li class="breadcrumb-item active" aria-current="page">Import / Export</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{-- khusus import  --}}
            {{--  <div class="col-6">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('pembayaran_santri.import_excel') }}"
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
                                    <a href='{{ route('pembayaran_santri.download_format_import_excel') }}'
                                        class="text-white btn bg-info" type="submit">Download Format</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  --}}

            {{-- khusus  export --}}
            <div class="col-6">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('pembayaran_santri.export_excel') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Bulan Pembayaran</label>
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="pembayaran_santri_bulans[]">
                                            SEMUA
                                        </label>
                                    </div>
                                    @foreach($pembayaran_santri_bulans as $index => $pembayaran_santri_bulan)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $pembayaran_santri_bulan }}" value="{{ $pembayaran_santri_bulan }}"
                                        @if($pembayaran_santri_bulan == old("pembayaran_santri_bulans.$index")) checked @endif name="pembayaran_santri_bulans[]">
                                        {{ $pembayaran_santri_bulan }}
                                      </label>
                                    </div>
                                    @endforeach

                                    @error('pembayaran_santri_bulans.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tahun</label>
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="tahuns[]">
                                            SEMUA
                                        </label>
                                    </div>
                                    @foreach($tahuns as $index => $tahun)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $tahun }}" value="{{ $tahun }}"
                                        @if($tahun == old("tahun.$index")) checked @endif name="tahuns[]">
                                        {{ $tahun }}
                                      </label>
                                    </div>
                                    @endforeach

                                    @error('tahuns')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{-- 
                            <div class="form-group">
                                <label class="col-md-12">Tahun</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='tahun'>
                                        <option value="">Semua</option>
                                        @foreach($tahuns as $tahun)
                                        <option value="{{ $tahun }}" @if(old('tahun') == $tahun) selected @endif>{{ $tahun }}</option>
                                        @endforeach
                                    </select>

                                    @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="kelas_ids[]">
                                            SEMUA
                                        </label>
                                    </div>
                                    @foreach($kelass as $index => $kelas)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $kelas->id }}" value="{{ $kelas->id }}"
                                        @if($kelas->id == old("kelas_ids.$index")) checked @endif name="kelas_ids[]">
                                        {{ $kelas->nama }}
                                      </label>
                                    </div>
                                    @endforeach

                                    @error('kelas_ids')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">
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
                            </div> --}}
                            
                            <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="statuss[]">
                                            SEMUA
                                        </label>
                                    </div>
                                    @foreach($statuss as $index => $status)
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $status }}" value="{{ $status }}"
                                        @if($status == old("status.$index")) checked @endif name="statuss[]">
                                        {{ $status }}
                                      </label>
                                    </div>
                                    @endforeach

                                    @error('statuss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">
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
                            </div> --}}

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
