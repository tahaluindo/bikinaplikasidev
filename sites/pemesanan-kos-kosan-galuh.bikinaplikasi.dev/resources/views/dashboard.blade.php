@extends('layouts.index')

@section('content')
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="body bg-pink">
                <div class="font-bold m-b--35">DATA PEMBAYARAN</div>
                <ul class="dashboard-stat-list">
                    <li>
                        HARI INI
                        <span class="pull-right"><b>{{ $pembayaran_hari_ini }}</b> </span>
                    </li>
                    <li>
                        KEMARIN
                        <span class="pull-right"><b>{{ $pembayaran_kemarin }}</b> </span>
                    </li>
                    <li>
                        MINGGU LALU
                        <span class="pull-right"><b>{{ $pembayaran_minggu_lalu }}</b> </span>
                    </li>
                    <li>
                        BULAN LALU
                        <span class="pull-right"><b>{{ $pembayaran_bulan_lalu }}</b> </span>
                    </li>
                    <li>
                        SEMUA
                        <span class="pull-right"><b>{{ $pembayaran_semua }}</b> </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="body bg-cyan">
                <div class="font-bold m-b--35">DATA PENYEWA</div>
                <ul class="dashboard-stat-list">
                    <li>
                        HARI INI
                        <span class="pull-right"><b>{{ $penyewa_hari_ini }}</b> </span>
                    </li>
                    <li>
                        KEMARIN
                        <span class="pull-right"><b>{{ $penyewa_kemarin }}</b> </span>
                    </li>
                    <li>
                        MINGGU LALU
                        <span class="pull-right"><b>{{ $penyewa_minggu_lalu }}</b> </span>
                    </li>
                    <li>
                        BULAN LALU
                        <span class="pull-right"><b>{{ $penyewa_bulan_lalu }}</b> </span>
                    </li>
                    <li>
                        SEMUA
                        <span class="pull-right"><b>{{ $penyewa_semua }}</b> </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="body bg-teal">
                <div class="font-bold m-b--35">DATA ASSET KOSAN</div>
                <ul class="dashboard-stat-list">
                    <li>
                        <a href='{{ url('type') }}' style="color: white;">Type</a>
                        <span class="pull-right"><b>{{ $total_type }}</b> </span>
                    </li>
                    <li>
                        <a href='{{ url('kamar') }}' style="color: white;">Kamar</a>
                        <span class="pull-right"><b>{{ $total_kamar }}</b> </span>
                    </li>
                    <li>
                        <a href='{{ url('penyewa') }}' style="color: white;">Penyewa</a>
                        <span class="pull-right"><b>{{ $total_penyewa }}</b> </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    TAGIHAN TERDEKAT MINGGU INI
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable-dashboard">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Penyewa</th>
                                <th>Inv</th>
                                <th>Trkhr Byar</th>
                                <th>Jth Tmpo</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            @foreach($tagihan_terdekats as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td><a href='{{ url("penyewa/{$data->penyewa->id}") }}' target="_blank">{{ $data->penyewa->nama }}</a></td>
                                <td>
                                    <a href="perpanjangan_sewa/{{ $data->invoice_id  }}">{{ $data->invoice_id}}</a>
                                </td>
                                <td>{{ $data->terakhir_bayar }}</td>
                                <td>{{ $data->jatuh_tempo }}</td>
                                <td>{{ $data->status }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <a type="button" href='{{ url("tagihan/{$data->id}/edit") }}' class="btn btn-primary btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a type="button" href='{{ url("perpanjangan_sewa/{$data->invoice_id}/renew") }}' class="btn btn-success btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">update</i>
                                    </a>

                                    <form action='{{ url("tagihan/$data->id") }}' method="post" style="display: inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"  onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    KAMAR KOSONG
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable-dashboard">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Lokasi</th>
                                <th>Type</th>
                                <th>Nomor</th>
                                <th>Status</th>
                                <th>Jml Pghuni</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            @foreach($kamar_kosongs as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td><b>{{ $data->lokasi }}</b></td>
                                <td><a href='{{ url("type/{$data->type->id}") }}' target='_blank'>{{ $data->type->nama }}</a></td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if($data->penyewa)
                                    <a href='{{ url("penyewa/{$data->penyewa->id}") }}' target="_blank">{{  $data->jumlah_penghuni }}  ({{ $data->penyewa->nama }})</a>
                                    @else
                                        {{  $data->jumlah_penghuni }}
                                    @endif
                                </td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <a type="button" href='{{ url("kamar/{$data->id}/edit") }}' class="btn btn-primary btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <form action='{{ url("kamar/$data->id") }}' method="post" style="display: inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"  onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<script type="text/javascript">
    //Exportable table
    $('.js-exportable-dashboard').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
</script>
@endsection