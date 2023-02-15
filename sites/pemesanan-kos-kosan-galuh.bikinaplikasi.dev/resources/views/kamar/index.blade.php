@extends('layouts.index')

@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Kamar Tersedia
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
                                <th>Type</th>
                                <th>Nomor</th>
                                <th>Status</th>
                                <th>Jml Pghuni</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                {{-- <td><a href='{{ url("lokasi/{$data->lokasi->id}") }}' target='_blank'>{{ $data->lokasi->nama }}</a></td> --}}
                                <td><a href='{{ url("type/{$data->type->id}") }}' target='_blank'>{{ $data->type->nama }}</a></td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                @if($data->penyewa)
                                    <a href='{{ url("penyewa/{$data->penyewa->id}") }}' target="_blank">{{  $data->jumlah_penghuni }} ({{ $data->penyewa->nama }}) </a>
                                @else
                                    {{  $data->jumlah_penghuni }}
                                @endif
                                </td>
                                <td>{{ $data->lokasi }}</td>
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

    var exportOptions = {
        columns: [
            0, 1, 2, 3, 4, 5, 6
        ]
    };
</script>

@endsection
