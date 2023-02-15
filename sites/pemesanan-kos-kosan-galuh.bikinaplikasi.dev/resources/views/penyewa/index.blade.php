@extends('layouts.index')

@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Penyewa
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
                                <th>Nomor Kamar</th>
                                <th>Type Sewa</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Foto ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                @if(isset($data->kamar->id))
                                <td><a href='{{ url("kamar/{$data->kamar->id}") }}' target="_blank">{{  $data->kamar->nomor }} | Isi: {{ $data->kamar->jumlah_penghuni }} </a></td>
                                @else
                                <td>Tidak Ada ({{ $data->status }})</td>
                                @endif
                                <td>{{ $data->type_sewa }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    @php
                                        $no_lama = substr($data->no_hp, 1);
                                        $no_baru = '62' . $no_lama;
                                    @endphp
                                    <a href='https://wa.me/{{ $no_baru }}' target="_blank">{{  $no_baru }} </a>
                                </td>
                                <td>
                                    <a href="{{ url($data->foto_identitas) }}" target="_blank">
                                        <img src="{{ url($data->foto_identitas) }}" class="" style="height: 120px; width:320px;">
                                    </a>
                                </td>
                                <td>
                                    @if($data->status != "Selesai Ngekos")
                                    <a type="button" href='{{ url("penyewa/{$data->id}/edit") }}' class="btn btn-primary btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    @endif

                                    <form action='{{ url("penyewa/$data->id") }}' method="post" style="display: inline-block">
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
            0, 1, 2, 3, 4, 5
        ]
    };
</script>

@endsection
