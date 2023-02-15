@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Periksa</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Periksa</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
    <div class="main-content">
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
                            <label for="dokter_id" class="font-weight-normal">Poli</label>
                            {{ Form::select('poli', ['Poli Lansia' => 'Poli Lansia (60 thn ke atas)', 'Poli Anak' => 'Poli Anak (0-12 thn)', 'Poli Umum' => 'Poli Umum (13 - 59 thn)', 'Poli Kebidanan' => 'Poli Kebidanan'], $obj['poli'], ['class' => 'form-control','placeholder' => '- Pilih Poli -'])}}
                            <span class="text-danger">{{ $errors->first('poli') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="dokter_id" class="font-weight-normal">Dokter</label>
                            <select class="form-control" name="dokter_id">
                                <option>-- Pilih Dokter --</option>
                                @foreach (\App\Dokter::all() as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $obj['dokter_id']) selected @endif>{{ $item->nama }} ({{ $item->poli }})</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('dokter_id') }}</span>
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
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- ./col -->
            </div>
    </div>

@endsection

