@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PENJUALAN</h3>

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Pelanggan Id</th>
            <th>Kavling Id</th>
            <th>Cara Pembayaran</th>
            <th>Lama Angsuran (Bulan)</th>
            <th>Batas Pembayaran</th>
            <th>Dp</th>
            <th>Biaya Ppjb</th>
            <th>Biaya Shm</th>
            <th>Total</th>
            <th>Catatan</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($penjualans as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->pelanggan->nama }}</td>
                <td>{{ $item->kavling->nomor_kavling }}</td>
                <td>{{ $item->cara_pembayaran }}</td>
                <td>{{ $item->lama_angsuran }}</td>
                <td>{{ $item->batas_pembayaran }}</td>
                <td>{{ toIdr($item->dp) }}</td>
                <td>{{ toIdr($item->biaya_ppjb) }}</td>
                <td>{{ toIdr($item->biaya_shm) }}</td>
                <td>{{ toIdr($item->total) }}</td>
                <td>{{ $item->catatan }}</td>
                <td>{{ $item->status }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection