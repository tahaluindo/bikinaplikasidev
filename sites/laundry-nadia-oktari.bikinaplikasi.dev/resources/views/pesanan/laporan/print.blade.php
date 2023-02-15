@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PESANAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>No</th>
            <th>Pelanggan Id</th>
            <th>Paket Id</th>
            <th>Jumlah</th>
            <th>Dipesan Pada</th>
            <th>Diambil Pada</th>
            <th>Status</th>
            <th>Admin</th>
            <th>Diskon</th>
            <th>Total</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pesanans as $pesanan)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $pesanan->no }}</td>

                <td>{{ $pesanan->pelanggan ? $pesanan->pelanggan->nama : "" }}</td>

                <td>{{ $pesanan->paket ? $pesanan->paket->nama : "" }}</td>

                <td>{{ $pesanan->jumlah }}</td>

                <td>{{ $pesanan->dipesan_pada }}</td>

                <td>{{ $pesanan->diambil_pada }}</td>

                <td>{{ $pesanan->status }}</td>

                <td>{{ toIdr($pesanan->admin) }}</td>
                <td>{{ toIdr($pesanan->diskon) }}</td>
                <td>{{ toIdr($pesanan->total) }}</td>


            </tr>
        @endforeach
            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ toIdr($pesanans->sum('admin')) }}</td>
                <td>{{ toIdr($pesanans->sum('diskon')) }}</td>
                <td>{{ toIdr($pesanans->sum('total')) }}</td>
            </tr>

        </tbody>
    </table>
@endsection