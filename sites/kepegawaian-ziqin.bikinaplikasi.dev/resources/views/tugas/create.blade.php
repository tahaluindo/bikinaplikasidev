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
        <h1 class="page-header">Tambah {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default" style="width:fit-content">
            <div class="panel-heading">Tambah {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form class="form-horizontal form-material" action="{{ url(route('tugas.store')) }}" method="post"
                    enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">pegawai</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='pegawai_id'>
                                    @foreach($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}" @if(old('pegawai_id')==$pegawai->id) selected
                                        @endif>
                                        {{ $pegawai->nama }} (Jabatan: {{$pegawai->riwayat_jabatan->nama_jabatan}}) 
                                    </option>
                                    @endforeach
                                </select>

                                @error('pegawai_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group">
                            <label class="col-md-12">Nomor Surat Tugas</label>
                            <div class="col-md-12">
                                <input class="form-control form-control-line" name='nomor_st'>
                                  
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Nama Tugas</label>
                            <div class="col-md-12">
                                <input class="form-control form-control-line" name='tugas'>
                                  
                            </div>
                        </div>

    <style>
        #one {
        margin-top: 50px;
        box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.2);
        }
        .it .btn-orange {
        background-color: transparent;
        border-color: #777 !important;
        color: #777;
        text-align: left;
        width: auto;
        }
        .it input.form-control {
        height: 54px;
        border: none;
        margin-bottom: 0px;
        border-radius: 0px;
        border-bottom: 1px solid #ddd;
        box-shadow: none;
        }
        .it .form-control:focus {
        border-color: #ff4d0d;
        box-shadow: none;
        outline: none;
        }
        .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
        }
        .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        }
        .it .btn-new,
        .it .btn-next {
        margin: 30px 0px;
        border-radius: 0px;
        background-color: #333;
        color: #f5f5f5;
        font-size: 16px;
        width: 155px;
        }
        .it .btn-next {
        background-color: #ff4d0d;
        color: #fff;
        }
        .it .btn-check {
        cursor: pointer;
        line-height: 54px;
        color: red;
        }
        .it .uploadDoc {
        margin-bottom: 20px;
        }
        .it .uploadDoc {
        margin-bottom: 20px;
        }
        .it .btn-orange img {
        width: 30px;
        }
        p {
        font-size: 16px;
        text-align: center;
        margin: 30px 0px;
        }
        .it #uploader .docErr {
        position: absolute;
        right: auto;
        left: 10px;
        top: -56px;
        padding: 10px;
        font-size: 15px;
        background-color: #fff;
        color: red;
        box-shadow: 0px 0px 7px 2px rgba(0, 0, 0, 0.2);
        display: none;
        }
        .it #uploader .docErr:after {
        content: "\f0d7";
        display: inline-block;
        font-family: FontAwesome;
        font-size: 50px;
        color: #fff;
        position: absolute;
        left: 30px;
        bottom: -40px;
        text-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
        }

    </style>
    <div class="form-group">
                                <label class="col-md-12">Upload File</label>
        <div class="col-md-12">

         
        <div class="row it">
        <div class="col-sm-offset-1 col-sm-10" style="width:800px; margin-left:0px" id="one">
        <p>
            Please upload documents only in 'pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png' & 'text' format.
        </p><br>
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4 form-group">
            <h3 class="text-center">Upload Surat Tugas</h3>
            </div>
            <!--form-group-->
        </div>
        <!--row-->
        <div id="uploader">
            <div class="row uploadDoc">
            <div class="col-sm-3">
                <div class="docErr">Please upload valid file</div>
                <!--error-->
                <div class="fileUpload btn btn-orange">
                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
                <span class="upl" id="upload">Upload document</span>
                <input type="file"  name='file' class="upload up"  />
                </div><!-- btn-orange -->
            </div><!-- col-3 -->
            <div class="col-sm-8">
                <input type="text" class="form-control" name="catatan" placeholder="Catatan">
            </div>
            <!--col-8-->
            <div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div><!-- col-1 -->
            </div>
            <!--row-->
        </div>
        <!--uploader-->
        
        
        <!--one-->
    </div><!-- row --> 

                                
                                 
    <!--
                        <div class="form-group">
                            <label class="col-md-12">tahun</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='tahun'>
                                    @foreach(range(date('Y') - 5, date('Y')) as $tahun)
                                    <option value="{{ $tahun }}" @if(old('tahun')==$tahun) selected
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
                                    class="form-control form-control-line flatpickr" value='{{ old('tanggal') }}'
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
-->
                        <div class="form-group">
                            <div class="col-sm-12"><br>                        
           <br>                        
           <br>  
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