@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PEMBELIAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Barang Id</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Tanggal</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pembelians as $pembelian)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $pembelian->barang->nama }}</td>

                <td>{{ $pembelian->jumlah }}</td>

                <td>{{ toIdr($pembelian->barang->harga_per_unit) }}</td>

                <td>{{ toIdr($pembelian->total) }}</td>

                <td>{{ $pembelian->tanggal }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection