@extends('bidan.layout.app2')

@section('style')
<link rel="stylesheet" href="{{asset('assets')}}/plugins/tagsinput/css/tagsinput.css">
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Periksa
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Periksa</a></li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding: 25px;">

                            <div class="row">
                                <div class="col-6">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>Kode Pasien</td>
                                            <td>&ensp;: PS-{{$periksa['pasien']['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>&ensp;: {{$periksa['pasien']['nama']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>&ensp;:
                                                @if($periksa['pasien']['jenis_kelamin'] == 'L')
                                                    Laki-Laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>&ensp;:
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $periksa['pasien']['tanggal_lahir'])->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>&ensp;: {{ $periksa['pasien']['alamat'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>&ensp;: {{ $periksa['pasien']['tlpn'] }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>Kode Periksa</td>
                                            <td>&ensp;: PR-{{$periksa['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gejala</td>
                                            <td>&ensp;:
                                                @php
                                                    $gejala = $periksa['gejala'];
                                                    $gejala = explode(',',$gejala);
                                                @endphp
                                                @foreach ($gejala as $item)
                                                    <span class="badge badge-primary">{{$item}}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Periksa</td>
                                            <td>&ensp;:
                                                @if ($periksa['status_periksa'] == 0)
                                                    <span class="badge badge-primary">Menunggu</span>
                                                @elseif ($periksa['status_periksa'] == 1)
                                                    <span class="badge badge-warning">Pengecekan</span>
                                                @elseif($periksa['status_periksa'] == 2)
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-3">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-tambah">
                                        <i class="fa fa-stethoscope" aria-hidden="true"></i> Diagnosa
                                    </button>
                                    @if ($periksa['status_periksa'] == 2)
                                        <a class="btn btn-success" target="popup"
                                           onclick="window.open('{{ url('bidan/periksa/'.$id.'/print') }}','print','width=595,height=842')"
                                           href="{{ url('bidan/periksa/'.$id.'/print') }}" role="button">
                                            <i class="fa fa-print" aria-hidden="true"></i> Print
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-lg font-weight-bold">Penyakit</div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Penyakit</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $diagnosa = $periksa['diagnosa'];
                                                $diagnosa = explode(',',$diagnosa);
                                            @endphp
                                            @foreach ($diagnosa as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-lg font-weight-bold">Obat</div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Obat</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $obat = $periksa['obat'];
                                                $obat = explode(',',$obat);
                                            @endphp
                                            @foreach ($obat as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item }}</td>
                                                </tr>
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
        </div>

        <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

        </footer>
    </div>


    {{-- modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-info text-white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-white">Diagnosa</h4>
                </div>
                {{ Form::open(array('action' => $action, 'files' => true, 'method' => $method)) }}
                <div class="modal-body">
                    <p>Data Periksa</p>
                    <div class="form-group">
                        <label for="diagnosa" class="font-weight-normal">Penyakit <span class="text-sm text-muted">( gunakan
                            tanda koma
                            untuk memisahkan
                            )</span></label>
                        <input type="text" class="form-control" name="diagnosa" id="diagnosa" aria-describedby="helpId"
                               placeholder="" value="flu" data-role="tagsinput">
                    </div>
                    <div class="form-group">
                        <label for="obat" class="font-weight-normal">Obat <span class="text-sm text-muted">( gunakan
                            tanda koma
                            untuk memisahkan
                            )</span></label>
                        <input type="text" class="form-control" name="obat" id="obat" aria-describedby="helpId"
                               placeholder="" value="paracetamol" data-role="tagsinput">
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

@section('script')

    <!-- Select2 -->
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <!-- TagsInput -->
    <script src="{{ asset('assets') }}/plugins/tagsinput/js/tagsinput.js"></script>

    <script>
        $(function () {
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
