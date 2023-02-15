@extends('layouts.index')

@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tagihan
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
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Penyewa</th>
                                <th>Inv</th>
                                <th>Trkhr Byar</th>
                                <th>Jth Tmpo</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td><a href='{{ url("penyewa/{$data->penyewa->id}") }}' target="_blank">{{ $data->penyewa->nama }}</a></td>
                                <td>
                                    <a href="perpanjangan_sewa/{{ $data->invoice_id  }}">{{ $data->invoice_id}}</a>
                                </td>
                                <td>{{ date('Y-m-d h:i:s A', strtotime($data->terakhir_bayar)) }}</td>
                                <td>{{ date('Y-m-d h:i:s A', strtotime($data->jatuh_tempo)) }}</td>
                                <td>{!! $data->status === 'Aktif' ? "<span class='badge bg-green'>$data->status</span>":"<span class='badge bg-red'>$data->status</span>" !!}
                                    {!! $data->perpanjanganSewa->last()->status ?? "" === 'Lunas' ? "<span class='badge bg-green'>Lunas</span>":"<span class='badge bg-yellow'>Belum Lunas</span>" !!}
                                </td>
                                <td>
                                    @if(isset($data->penyewa->kamar_id))
                                    <a type="button" href='{{ url("tagihan/{$data->id}/edit") }}' class="btn btn-primary btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a type="button" href='{{ url("perpanjangan_sewa/{$data->invoice_id}/renew") }}' class="btn btn-success btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">update</i>
                                    </a>
                                    @endif

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

<script type="text/javascript">

    var exportOptions = {
        columns: [0,1,2,3,4,5]
    };
</script>

@endsection
