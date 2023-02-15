@extends('layouts.app2')

@section('content')
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <div class="col-md-12">
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
            </div>
        </div>
    </div>


    <script>
        const locationHrefHapusSemua = "{{ url('pengembalian/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pengembalian/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pengembalian/create') }}";
        var columnOrders = [{{ $pengembalian_count - 2}}];
        var urlSearch = "{{ url('pengembalian') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;


    </script>
@endsection

