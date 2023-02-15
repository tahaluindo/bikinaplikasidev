@extends('pegawai.layout.app')

@section('style')
<link rel="stylesheet" href="{{asset('assets')}}/plugins/tagsinput/css/tagsinput.css">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">UBAH DATA</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('pegawai/pasien/'. $id1 .'/periksa') }}"
                        class="btn btn-primary m-0 text-white pt-1 pb-1 pr-3 pl-3"><i
                            class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-success justify-content-between">
                            <h3 class="card-title font-weight-bold text-white">Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="card-body">
                            <p>Data Periksa</p>

                        <div class="form-group">
                            <label for="bidan_id" class="font-weight-normal">Bidan</label>
                            <select class="form-control" name="bidan_id">
                                <option>-- Pilih Bidan --</option>
                                @foreach (\App\Bidan::all() as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $obj['bidan_id']) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('bidan_id') }}</span>
                        </div>

                            <div class="form-group">
                                <label for="gejala" class="font-weight-normal">Gejala <span class="text-sm text-muted">(
                                        gunakan
                                        tanda koma
                                        untuk memisahkan
                                        )</span></label>
                                <input type="text" class="form-control" name="gejala" id="gejala"
                                    aria-describedby="helpId" placeholder="" value="{{ $obj['gejala'] }}"
                                    data-role="tagsinput">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-success text-right">
                            <button type="submit" class="btn btn-outline-light">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection

@section('script')
<!-- TagsInput -->
<script src="{{ asset('assets') }}/plugins/tagsinput/js/tagsinput.js"></script>
@endsection