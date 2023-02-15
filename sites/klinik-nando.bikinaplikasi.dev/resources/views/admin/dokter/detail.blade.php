@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Dokter</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dokter</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row justify-content-between" style="margin-bottom: 10px;">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success mb-3"
                                        data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Poli
                                </button>
                            </div>
                        </div>

                        <div class="row" style="padding: 15px;">
                            <table class>
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
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>SP-{{ $item['id'] }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td class="text-right">
                                                <button type="button"
                                                        data-id_data="{{ implode(',',$item['pivot'])}}"
                                                        data-kode_data="SP-{{$item['id']}}"
                                                        class="btn btn-danger btn-sm open-modal-hapus"
                                                        data-toggle="modal"
                                                        data-target="#modal-hapus-{{ $item['id'] }}">
                                                    <i class="fa fa-trash-alt"></i> Hapus
                                                </button>
                                            </td>
                                        </tr>

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
                                                              action="{{url('admin/dokter/' . $dokter['id'] .'/detail')}}">
                                                            @method('delete')
                                                            @csrf
                                                            <input id="id" type="hidden" name="id"
                                                                   value="{{ $item['id'] }}">
                                                            <button type="button" class="btn btn-success"
                                                                    data-dismiss="modal">Close
                                                            </button>

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
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-info text-white">
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
                <div class="modal-footer btn-info justify-content-between">
                    <div></div>
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection