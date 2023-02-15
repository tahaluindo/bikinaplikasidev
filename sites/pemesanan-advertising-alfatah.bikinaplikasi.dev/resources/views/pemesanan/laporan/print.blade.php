@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PEMESANAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id Transaksi</th>
            <th>Pelanggan</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Created At</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pemesanans as $pemesanan)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ "TRX-00000" . $pemesanan->id }}</td>
                <td>
                    ({{ toIdr($pemesanan->pemesanan_details->sum('total')) }}) <strong>{{ $pemesanan->pelanggan->nama }}</strong>

                    @foreach($pemesanan->pemesanan_details as $item)
                        <li>({{ toIdr($item->total) }}) {{ $item->produk->nama }}: {{ $item->jumlah }}
                            @ {{ toIdr($item->harga) }}</li>
                    @endforeach
                </td>
                
                <td>{{ $pemesanan->status }}</td>
                <td>{{ $pemesanan->catatan }}</td>
                <td>{{ $pemesanan->created_at }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection