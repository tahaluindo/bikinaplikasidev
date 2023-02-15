@extends('layouts.app3')

@section('content')
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap mt-3">
                    <h2 class="title-1">Pengembalian</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12  mt-3">
                <div class="table-responsive m-b-40">
                    <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Peminjaman Id</th>
                                <th>Tanggal</th>
                                <th>Denda Terlambat</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Jatuh Tempo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pengembalian as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->peminjaman->anggota->nama }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ toIdr($item->denda_terlambat) }}</td>
                                    <td>{{ $item->peminjaman->tanggal }}</td>
                                    <td>{{ $item->peminjaman->tanggal_pengembalian }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('pengembalian/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pengembalian/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pengembalian/create') }}";
        var columnOrders = [{{ $pengembalian_count }}];
        var urlSearch = "{{ url('pengembalian') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection
