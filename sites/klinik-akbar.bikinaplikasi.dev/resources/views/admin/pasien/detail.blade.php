@extends('admin.layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">DETAIL Pasien</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/pasien') }}" class="btn btn-primary m-0 text-white pt-1 pb-1 pr-3 pl-3"><i
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
                            <h3 class="card-title font-weight-bold text-white">pasien</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>&ensp;: KD-{{$pasien['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>&ensp;: {{$pasien['nama']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>&ensp;:
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pasien['tanggal_lahir'])->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>&ensp;:
                                                @if($pasien['jenis_kelamin'] == 'L')
                                                Laki-Laki
                                                @else
                                                Perempuan
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>&ensp;: {{ $pasien['alamat'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>&ensp;: {{ $pasien['tlpn'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
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
@endsection