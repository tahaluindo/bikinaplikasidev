@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Spesialis</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Spesialis</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                    data-target="#modal-tambah">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                            </button>

                            <div class="row justify-content-between" style="margin-bottom: 10px;">

                                <div class="col-sm-12">
                                    <form method="POST" action="{{ url('admin/periksa/cari') }}"
                                          class="form-inline pull-right">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName2">Kata Kunci</label>
                                            <input name="cari" type="text" class="form-control" placeholder="Cari"
                                                   value="{{ isset($cari) ? $cari : '' }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </form>
                                </div>
                            </div>

                            @if (isset($cari))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Pencarian nama dengan kata kunci '{{$cari}}'</p>
                                    </div>
                                </div>
                            @endif
                            @if (empty($spesialis))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Data Tidak Ada</p>
                                    </div>
                                </div>
                            @endif

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
                                                        class="btn btn-danger btn-sm open-modal-hapus"
                                                        data-toggle="modal"
                                                        data-target="#modal-hapus-{{ $item['id'] }}">
                                                    <i class="fa fa-trash-alt"></i> Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        {{-- modal hapus --}}
                                        <div class="modal fade" id="modal-hapus-{{ $item['id'] }}">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header btn-info">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title text-white">Informasi</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="informasi">Yakin akan menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer btn-info justify-content-between">
                                                        <form class="d-inline" method="POST"
                                                              action="{{url('admin/spesialis')}}">
                                                            @method('delete')
                                                            @csrf
                                                            <input id="id" type="hidden" name="id"
                                                                   value="{{ $item['id'] }}">
                                                            <button type="submit" class="btn btn-danger">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                    </div>
    </div>


{{-- modal tambah --}}
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info text-white">
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
            <div class="modal-footer justify-content-between btn-info">
                <div></div>
                <button type="submit" class="btn btn-default">Simpan</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

