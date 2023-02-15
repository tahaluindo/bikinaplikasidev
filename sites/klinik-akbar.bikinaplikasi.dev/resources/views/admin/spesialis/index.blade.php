@extends('admin.layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">DATA MASTER</h1>
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
                            <h3 class="card-title font-weight-bold text-white">Poli</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                data-target="#modal-tambah">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                            </button>
                            <div class="table-responsive">
                                <table id="example1" class="table border table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Poli</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spesialis as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>SP-{{ $item['id'] }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td class="text-right">
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ url('admin/spesialis/'. $item['id']) }}" role="button"> <i
                                                        class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                    Ubah</a>

                                                <button type="button" data-id_data="{{$item['id']}}"
                                                    data-kode_data="SP-{{$item['id']}}"
                                                    class="btn btn-danger btn-sm open-modal-hapus" data-toggle="modal"
                                                    data-target="#modal-hapus">
                                                    <i class="fa fa-trash-alt"></i> Hapus
                                                </button>
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
<div class="modal fade" id="modal-tambah">
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
                <p>Data Poli</p>
                <div class="form-group">
                    {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
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
                <form class="d-inline" method="POST" action="{{url('admin/spesialis')}}">
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