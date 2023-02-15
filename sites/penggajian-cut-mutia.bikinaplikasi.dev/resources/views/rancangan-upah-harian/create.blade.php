@extends('layouts.app')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <em class="fa fa-home"></em>
            </a>
        </li>

        <li class="active">{{ str_replace("Rancangan", "", ucwords(preg_replace("/_|-/", " ", Request::segment(1)))) }}</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah {{ str_replace("Rancangan", "", ucwords(preg_replace("/_|-/", " ", Request::segment(1)))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Tambah {{ ucwords(preg_replace("/_|-/", " ", Request::segment(1))) }}</div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form class="form-horizontal form-material" action="{{ url(route('rancangan-upah-harian.store')) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">karyawan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='karyawan_id'>
                                    @foreach($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" @if(old('karyawan_id')==$karyawan->id) selected
                                        @endif>
                                        {{ $karyawan->nama }} (Gaji: {{ toIdr($karyawan->riwayat_jabatan->gaji_pokok) }},
                                         Bpjs: {{ toIdr($karyawan->riwayat_jabatan->bpjs) }})
                                    </option>
                                    @endforeach
                                </select>

                                @error('karyawan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Jenis Pekerjaan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='jenis_pekerjaan'>
                                    @foreach(['Piringan','Peruning','Mupuk','Nyusun Janjang Tangkos','Nyemprot Hama Sawit','Nerbas','Pembibitan'] as $jenis_pekerjaan)
                                    <option value="{{ $jenis_pekerjaan }}" @if(old('jenis_pekerjaan')==$jenis_pekerjaan) selected
                                        @endif>{{ $jenis_pekerjaan }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('jenis_pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Blok</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='blok'>
                                    @foreach(['Afdeling I','Afdeling II','Afdeling III','Afdeling IV','Afdeling V','Afdeling VI'] as $blok)
                                    <option value="{{ $blok }}" @if(old('blok')==$blok) selected
                                        @endif>{{ $blok }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('blok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Satuan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='satuan'>
                                    @foreach(['1.666 Pokok', '1.700 Pokok'] as $satuan)
                                    <option value="{{ $satuan }}" @if(old('satuan')==$satuan) selected
                                        @endif>{{ $satuan }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Harga Satuan</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="2500"
                                    class="form-control form-control-line" value='{{ old('harga_satuan') == "" ? 0 : old('harga_satuan') }}'
                                    name='harga_satuan'>

                                @error('harga_satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Jam Kerja</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="6"
                                    class="form-control form-control-line" value='{{ old('jam_kerja') == "" ? 1 : old('jam_kerja') }}'
                                    name='jam_kerja' max="24" min="1">

                                @error('jam_kerja')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                                               

                        <div class="form-group">
                            <label class="col-md-12">Periode</label>
                            <div class="col-md-12">
                                <input type="date" placeholder="25-02-1980"
                                    class="form-control form-control-line flatpickr" value='{{ old('periode') == "" ? date("Y-m-d") : old('periode') }}'
                                    name='periode'>

                                @error('periode')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Catatan (Tidak Wajib)</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Catatan"
                                    class="form-control form-control-line" value='{{ old('catatan') }}'
                                    name='catatan'>

                                @error('catatan')
                                <span class="invalid-feedback text-danger" role="alert">
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