@extends('admin.layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">DETAIL DOKTER</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/dokter') }}" class="btn btn-primary m-0 text-white pt-1 pb-1 pr-3 pl-3"><i
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
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <h3 class="card-title font-weight-bold text-white">Dokter</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>&ensp;: KD-{{$dokter['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>&ensp;: {{$dokter['nama']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin hffgh</td>
                                            <td>&ensp;:
                                                @if($dokter['jenis_kelamin'] == 'L')
                                                Laki-Laki
                                                @else
                                                Perempuan
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>&ensp;: {{ $dokter['alamat'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>&ensp;: {{ $dokter['tlpn'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jadwal</td>
                                            <td>&ensp;: {{ $dokter['jadwal'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Poli</td>
                                            <td>&ensp;: {{ $dokter['poli'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                    data-target="#modal-tambah">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Poli
                                </button>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table border table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th class="text-right">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dokter['spesialis'] as $item)
                                            {{-- @php
                                            dd($dokter)
                                            @endphp --}}
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>SP-{{ $item['id'] }}</td>
                                                <td>{{ $item['nama'] }}</td>
                                                <td class="text-right">
                                                    <button type="button"
                                                        data-id_data="{{ implode(',',$item['pivot'])}}"
                                                        data-kode_data="SP-{{$item['id']}}"
                                                        class="btn btn-danger btn-sm open-modal-hapus"
                                                        data-toggle="modal" data-target="#modal-hapus">
                                                        <i class="fa fa-trash-alt"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title text-white">Tambah Poli</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('action' => $action, 'method' => $method)) }}
            <div class="modal-body">
                <p>Data Poli</p>
                <div class="form-group">
                    <input type="hidden" name="dokter_id" value="{{ $dokter['id'] }}">
                    {{ Form::select('spesialis_id', $spesialis, null, ['class' => 'form-control','placeholder' => '- Pilih Poli -'])}}
                    <span class="text-danger">{{ $errors->first('spesialis_id') }}</span>
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
</div>

{{-- modal hapus --}}
<div class="modal fade" id="modal-hapus">
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
                <form class="d-inline" method="POST" action="{{url('admin/dokter/' . $dokter['id'] .'/detail')}}">
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
</div>
@endsection