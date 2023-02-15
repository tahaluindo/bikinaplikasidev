@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PEMESANAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Kode</th>
            <th>No Meja</th>
            <th>No Hp</th>
            <th>Nama Pelanggan</th>
            <th>Produk</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pemesanans as $pemesanan)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $pemesanan->id }}</td>
                <td>{{ $pemesanan->meja->no_meja }}</td>
                <td>{{ $pemesanan->no_hp }}</td>
                <td>{{ $pemesanan->nama_pelanggan }}</td>

                <td>
                    ({{ toIdr(!is_array($pemesanan->pemesanan_details) ? $pemesanan->pemesanan_details->sum('total') : collect($pemesanan->pemesanan_details)->sum('total')) }})
                    <strong>Pelanggan: {{ $pemesanan->nama_pelanggan }}</strong>

                    @foreach($pemesanan->pemesanan_details as $item)
                        <li>({{ toIdr($item->total) }}) {{ $item->produk->nama ?? "-" }}: {{ $item->jumlah }}
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