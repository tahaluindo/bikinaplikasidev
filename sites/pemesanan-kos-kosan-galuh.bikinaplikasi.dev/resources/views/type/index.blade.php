@extends('layouts.index')

@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Type Kamar Tersedia
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
                                <th>Nama</th>
                                <th>Harian</th>
                                <th>Har Tambahan</th>
                                <th>Mingguan</th>
                                <th>Mingg Tambahan</th>
                                <th>Bulanan</th>
                                <th>Bul Tambahan</th>
                                <th>Tahunan</th>
                                <th>Tahn Tambahan</th>
                                <th>Fasilitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $format_idr($data->harga_harian) }}</td>
                                <td>{{ $format_idr($data->harian_tambahan) }}</td>
                                <td>{{ $format_idr($data->harga_mingguan) }}</td>
                                <td>{{ $format_idr($data->mingguan_tambahan) }}</td>
                                <td>{{ $format_idr($data->harga_bulanan) }}</td>
                                <td>{{ $format_idr($data->bulanan_tambahan) }}</td>
                                <td>{{ $format_idr($data->harga_tahunan) }}</td>
                                <td>{{ $format_idr($data->tahunan_tambahan) }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fasilitas-detals-{{ $data->id }}">
                                    Lihat
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="fasilitas-detals-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Fasilitas untuk type {{ $data->nama }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="body">
                                                <ul class="list-group">
                                                    @if($data->fasilitas !== null)

                                                        @php
                                                            $fasilitasies = explode(',', $data->fasilitas);
                                                        @endphp

                                                        @foreach($fasilitasies as $fasilitas)
                                                        <li class="list-group-item">
                                                            <span>
                                                                <i class="material-icons">done</i>
                                                                <span class="icon-name">{{ $fasilitas }}</span>
                                                            </span>
                                                        </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                </td>
                                <td>
                                    <a type="button" href='{{ url("type/{$data->id}/edit") }}' class="btn btn-primary btn-xs btn-circle-sm waves-effect waves-circle waves-float waves-circle">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <form action='{{ url("type/$data->id") }}' method="post" style="display: inline-block">
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
        columns: [0,1,2,3,4,5,7,8,9,10]
    };
</script>

@endsection
