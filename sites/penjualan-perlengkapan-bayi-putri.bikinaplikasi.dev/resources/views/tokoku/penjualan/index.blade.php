@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-map-marker-alt fa-fw"></span> List Penjualan Pelanggan</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                @if(session()->has('status'))
                <script>
                    alert("{{session()->get('status')}}")
                </script>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggan</th>
                        <th>Tggl Pesanan</th>
                        <th>Alamat</th>
                        <th>Total Berat</th>
                        <th>Ongkir</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>No Resi</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$penjualans->count())
                    <tr>
                        <td colspan="3"> No Data </td>
                    </tr>
                    @else
                        @foreach($penjualans as $penjualan)
                        <tr>
                            <td> {{ $penjualan->id_penjualan }} </td>
                            <td> {{ $penjualan->user->name }} </td>
                            <td> {{ $penjualan->tgl_penjualan }} </td>
                            <td> {{ $penjualan->alamat_kirim }} </td>
                            <td>{{number_format($penjualan->total_berat, 0, ',', '.')}}g</td>
                            <td>Rp{{number_format($penjualan->ongkir, 0, ',', '.')}}</td>
                            <td> Rp{{ number_format($penjualan->detail_penjualans->sum('harga_total'), 0, ',', '.') }} </td>
                            <td> {{ $penjualan->status }} </td>
                            <td> {{ $penjualan->no_resi }} </td>
                            <td> 
                                <a href="{{ url($penjualan->bukti_transfer) }}">
                                    <img src="{{ url($penjualan->bukti_transfer) }}" alt="Tidak ada bukti" width="100" height=100>
                                </a>
                            </td>
                            <td> 
                                @if($penjualan->status == "Selesai")
                                <span class='badge badge-success'>Selesai</span>
                                @else
                                <a href="{{ route('penjualan.admin.input_resi', $penjualan->id_penjualan) }}">Update Resi</a>
                                <a href="{{ route('penjualan.admin.selesaikan_pesanan', $penjualan->id_penjualan) }}" onclick='return confirm("Yakin akan menyelesaikan pesanan ini?");'>Selesaikan</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection