@extends("layouts.monster-admin-lite.app")

@section("content")
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Absensi Detail ({{ $absensi->tanggal }})</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=5>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($absensi->absensi_details as $absensi_detail)
                                    <tr data-id='{{ $absensi_detail->id }}'>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $absensi_detail->user->nama }}</td>
                                        <td>{{ $absensi_detail->status }}</td>
                                        <td class="text-center">
                                            <a class="label label-primary" href="{{ url(route('absensi.hadir', ['absensi_detail' => $absensi_detail->id, 'user' => $absensi_detail->user->id])) }}">Hadir</a>
                                            <a class="label label-info" href="{{ url(route('absensi.tidak-hadir', ['absensi_detail' => $absensi_detail->id, 'user' => $absensi_detail->user->id])) }}">Tidak Hadir</a>
                                            <a class="label label-warning" href="{{ url(route('absensi.izin', ['absensi_detail' => $absensi_detail->id, 'user' => $absensi_detail->user->id])) }}">Izin</a>
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
    </div>

    <script>
        var locationHrefHapusSemua = "{{ url('absensi/hapus_semua') }}";
        var locationHrefCreate = "{{ url('absensi/create') }}";
        var columnOrders = [0, 1];
        var urlSearch = "{{ url('balasan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "cari absensi...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection
