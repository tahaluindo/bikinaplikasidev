@extends('layouts.app')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <em class="fa fa-home"></em>
            </a>
        </li>

        <li class="active">{{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Edit {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form class="form-horizontal form-material" action="{{ url(route('penggajian.update', $penggajian->id)) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label class="col-md-12">karyawan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='karyawan_id'>
                                    @foreach($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" @if(old('karyawan_id')==$karyawan->id || $penggajian->karyawan_id == $karyawan->id) selected
                                        @endif>{{ $karyawan->nama }} (Gaji: {{ toIdr($karyawan->riwayat_jabatan->gaji_pokok) }}, Bpjs: {{ toIdr($karyawan->riwayat_jabatan->bpjs) }})
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
                            <label class="col-md-12">Tonase Panen</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="110x30000"
                                       class="form-control form-control-line" id="example-gaji"
                                       value='{{ old('tonase_panen') == "" ? $penggajian->tonase_panen : old('tonase_panen') }}' name='tonase_panen'>

                                @error('tonase_panen')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Bpjs</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="Bpjs"
                                    class="form-control form-control-line" value='{{ old('bpjs') == "" ? $penggajian->bpjs : old('bpjs') }}'
                                    name='bpjs' min="0">

                                @error('bpjs')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Bonus</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="Bonus"
                                    class="form-control form-control-line" value='{{ old('bonus') == "" ? $penggajian->bonus : old('bonus') }}'
                                    name='bonus'>

                                @error('bonus')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Hutang (Ex: 1000000,2000000,3000000)</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Hutang"
                                    class="form-control form-control-line" value='{{ old('hutang') == "" ? $penggajian->hutang : old('hutang') }}'
                                    name='hutang'>

                                @error('hutang')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">periode</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='periode'>
                                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $periode)
                                    <option value="{{ $periode }}" @if(old('periode')==$periode || $penggajian->periode == $periode) selected
                                        @endif>{{ $periode }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('periode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">tahun</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='tahun'>
                                    @foreach(range(date('Y') - 5, date('Y')) as $tahun)
                                    <option value="{{ $tahun }}" @if(old('tahun')==$tahun || $penggajian->tahun == $tahun) selected
                                        @endif>{{ $tahun }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('tahun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="25-02-1980"
                                    class="form-control form-control-line flatpickr" value='{{ old('tanggal') == "" ? $penggajian->tanggal : old('tanggal') }}'
                                    name='tanggal'>

                                @error('tanggal')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Catatan (Tidak Wajib)</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Catatab"
                                    class="form-control form-control-line" value='{{ old('catatan') == "" ? $penggajian->catatan : old('catatan') }}'
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