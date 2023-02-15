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
                                <th>Inv</th>
                                <th>Jenis Perpanjangan</th>
                                <th>Lama Perpanjangan</th>
                                <th>Untuk Tempo</th>
                                <th>Biaya</th>
                                <th>B. Tambahan</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $data->tagihan_id }}</td>
                                <td>{{ $data->jenis_perpanjangan }}</td>
                                <td>{{ $data->lama_perpanjangan }}</td>
                                <td>{{ $data->untuk_tempo }}</td>
                                <td>{{ $data->biaya }}</td>
                                <td>{{ $data->biaya_tambahan }}</td>
                                <td>{{ $data->total }}</td>
                                <td>{{ $data->methode }}</td>
                                <td>
                                    <a type="button" href='{{ url("perpanjangan_sewa/{$data->id}/edit") }}' class="btn btn-primary btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <form action='{{ url("perpanjangan_sewa/$data->id") }}' method="post" style="display: inline-block">
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
        columns: [0,1,2,3,4,5,6,7,8]
    };
</script>

@endsection
