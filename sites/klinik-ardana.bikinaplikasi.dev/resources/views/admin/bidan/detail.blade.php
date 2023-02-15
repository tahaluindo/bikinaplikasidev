@extends('layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Bidan
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Bidan</a></li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row justify-content-between" style="margin-bottom: 10px;">
                                <div class="col-sm-6">
{{--                                    <button type="button" class="btn btn-success mb-3"--}}
{{--                                            data-toggle="modal" data-target="#modal-tambah">--}}
{{--                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Poli--}}
{{--                                    </button>--}}
                                </div>
                            </div>

                            <div class="row" style="padding: 15px;">
                                <table class>
                                    <tbody>
                                    <tr>
                                        <td>Kode</td>
                                        <td>&ensp;: KD-{{$bidan['id']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&ensp;: {{$bidan['nama']}}</td>
                                    </tr>

                                    <tr>
                                        <td>Alamat</td>
                                        <td>&ensp;: {{ $bidan['alamat'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>&ensp;: {{ $bidan['tlpn'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jadwal</td>
                                        <td>&ensp;: {{ $bidan['jadwal'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table border table-hover text-nowrap">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>#</th>--}}
{{--                                            <th>Kode</th>--}}
{{--                                            <th>Nama</th>--}}
{{--                                            <th class="text-right">Aksi</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach ($bidan['spesialis'] as $item)--}}
{{--                                            <tr>--}}
{{--                                                <td>{{ $loop->iteration }}</td>--}}
{{--                                                <td>SP-{{ $item['id'] }}</td>--}}
{{--                                                <td>{{ $item['nama'] }}</td>--}}
{{--                                                <td class="text-right">--}}
{{--                                                    <button type="button"--}}
{{--                                                            data-id_data="{{ implode(',',$item['pivot'])}}"--}}
{{--                                                            data-kode_data="SP-{{$item['id']}}"--}}
{{--                                                            class="btn btn-danger btn-sm open-modal-hapus"--}}
{{--                                                            data-toggle="modal" data-target="#modal-hapus-{{ $item['id'] }}">--}}
{{--                                                        <i class="fa fa-trash-alt"></i> Hapus--}}
{{--                                                    </button>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}

{{--                                            <div class="modal fade" id="modal-hapus-{{ $item['id'] }}">--}}
{{--                                                <div class="modal-dialog modal-md">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header btn-info">--}}
{{--                                                            <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                                    aria-label="Close">--}}
{{--                                                                <span aria-hidden="true">&times;</span>--}}
{{--                                                            </button>--}}
{{--                                                            <h4 class="modal-title text-white">Informasi</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                            <p id="informasi">Yakin akan menghapus data ini?</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-footer btn-info justify-content-between">--}}




{{--                                                            <form class="d-inline" method="POST"--}}
{{--                                                                  action="{{url('admin/bidan/' . $bidan['id'] .'/detail')}}">--}}
{{--                                                                @method('delete')--}}
{{--                                                                @csrf--}}
{{--                                                                <input id="id" type="hidden" name="id"--}}
{{--                                                                       value="{{ $item['id'] }}">--}}
{{--                                                                <button type="button" class="btn btn-success"--}}
{{--                                                                        data-dismiss="modal">Close--}}
{{--                                                                </button>--}}

{{--                                                                <button type="submit" class="btn btn-danger">--}}
{{--                                                                    Hapus--}}
{{--                                                                </button>--}}
{{--                                                            </form>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>


            {{-- modal tambah --}}
{{--            <div class="modal fade" id="modal-tambah">--}}
{{--                <div class="modal-dialog">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header btn-info text-white">--}}
{{--                            <h4 class="modal-title text-white">Tambah Poli</h4>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        {{ Form::open(array('action' => $action, 'method' => $method)) }}--}}
{{--                        <div class="modal-body">--}}
{{--                            <p>Data Poli</p>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="hidden" name="bidan_id" value="{{ $bidan['id'] }}">--}}
{{--                                {{ Form::select('spesialis_id', $spesialis, null, ['class' => 'form-control','placeholder' => '- Pilih Poli -'])}}--}}
{{--                                <span class="text-danger">{{ $errors->first('spesialis_id') }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer btn-info justify-content-between bg-success">--}}
{{--                            <div></div>--}}
{{--                            <button type="submit" class="btn btn-default">Simpan</button>--}}
{{--                        </div>--}}
{{--                        {!! Form::close() !!}--}}
{{--                    </div>--}}
{{--                    <!-- /.modal-content -->--}}
{{--                </div>--}}
{{--                <!-- /.modal-dialog -->--}}
{{--            </div>--}}

            <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

            </footer>
        </div>
    </div>
@endsection