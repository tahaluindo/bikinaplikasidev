@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Pengembalian</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>nama peminjam</th>
                                        <th>Tanggal Pengembalian</th>
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
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ toIdr($item->denda_terlambat) }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->peminjaman->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->peminjaman->tanggal_pengembalian)->format('d-m-Y') }}</td>

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

