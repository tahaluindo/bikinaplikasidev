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
        <div class="row" >
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding: 25px !important;">
                            <div class="row" >
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>Kode Periksa</td>
                                            <td>&ensp;: PR-{{$periksa['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Periksa</td>
                                            <td>&ensp;:
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $periksa['created_at'])->format('d/m/Y') }}
                                            </td>
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
                                            <td>Status Periksa 1</td>
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
                                        <tr>
                                            <td>Rumah Sakit Rujukan</td>
                                            <td>:
                                                {{ $periksa['rumah_sakit_rujukan'] }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-3">
                                    @if ($periksa['status_periksa'] == 2)
                                        <a class="btn btn-success" target="popup"
                                           onclick="window.open('{{ url('admin/periksa/'.$id.'/print') }}','print','width=600,height=400')"
                                           role="button" >
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


@endsection



