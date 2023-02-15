@extends('dokter.layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">DATA PERIKSA</h1>
                </div><!-- /.col -->
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
                        <div class="card-header bg-success">
                            <h3 class="card-title font-weight-bold text-white">Periksa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover text-nowrap ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Periksa</th>
                                            <th>Nama</th>
                                            <th>Pemeriksa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alergi Obat</th>
                                            <th>Gejala</th>
                                            <th>Status Periksa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($periksa as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }}
                                            </td>
                                            <td>{{ $item['pasien']['nama'] }}</td>
                                            <td>{{ $item['dokter']['nama'] }}</td>
                                            <td>
                                                @if($item['pasien']['jenis_kelamin'] == 'L')
                                                Laki-Laki
                                                @else
                                                Perempuan
                                                @endif
                                            </td>
                                            <td> {{ $item['pasien']['alergi_obat'] }}</td>
                                            <td>
                                                @php
                                                $gejala = $item['gejala'];
                                                $gejala = explode(',',$gejala);
                                                @endphp
                                                @foreach ($gejala as $item2)
                                                {{-- <ul> --}}
                                                <li style="list-style-type: none">
                                                    <span class="badge badge-danger">{{$item2}}</span>
                                                </li>
                                                {{-- </ul> --}}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($item['status_periksa'] == 0)
                                                <span class="badge badge-primary">Menunggu</span>
                                                @elseif ($item['status_periksa'] == 1)
                                                <span class="badge badge-warning">Pengecekan</span>
                                                @elseif($item['status_periksa'] == 2)
                                                <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

{{-- modal tambah --}}
{{-- <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title text-white">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('action' => $action, 'files' => true, 'method' => $method)) }}
<div class="modal-body">
    <p>Data Pasien</p>
    <div class="form-group">
        {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
        <span class="text-danger">{{ $errors->first('nama') }}</span>
    </div>
    <div class="form-group">
        {{ Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control','placeholder' => '- Pilih Jenis Kelamin -'])}}
        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input name="tanggal_lahir" type="text" class="form-control" data-inputmask-alias="datetime"
                data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Tanggal Lahir"
                value="{{ old('tanggal_lahir') }}">
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::text('alamat',null,['class' => 'form-control', 'placeholder' => 'Alamat']) }}
        <span class="text-danger">{{ $errors->first('alamat') }}</span>
    </div>
    <div class="form-group">
        {{ Form::text('tlpn',null,['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
        <span class="text-danger">{{ $errors->first('tlpn') }}</span>
    </div>
    <div class="form-group">
        {{ Form::text('alergi_obat',null,['class' => 'form-control', 'placeholder' => 'Alergi Obat']) }}
        <span class="text-danger">{{ $errors->first('alergi_obat') }}</span>
    </div>
</div>
<div class="modal-footer justify-content-between bg-success">
    <div></div>
    <button type="submit" class="btn btn-outline-light">Simpan</button>
</div>
{!! Form::close() !!}
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> --}}

{{-- modal hapus --}}
{{-- <div class="modal fade" id="modal-hapus">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white">Informasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="informasi"></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" action="{{url('admin/pasien')}}">
@method('delete')
@csrf
<input id="id" type="hidden" name="id" value="">
<button type="submit" class="btn btn-danger">
    Hapus</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> --}}

@endsection

@section('script')

<!-- Select2 -->
<script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })

        $('[data-mask]').inputmask()

    })
</script>
@endsection