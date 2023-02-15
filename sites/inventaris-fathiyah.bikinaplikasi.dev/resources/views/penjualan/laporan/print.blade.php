@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PENJUALAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th>
            <th>Pelanggan Id</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Created At</th>

        </tr>
        </thead>
        <tbody>
        @foreach($penjualans as $penjualan)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $penjualan->id }}</td>
                <td>
                    ({{ toIdr($penjualan->penjualan_details->sum('total')) }}) <strong>{{ $penjualan->pelanggan->nama }}</strong>

                    @foreach($penjualan->penjualan_details as $item)
                        <li>({{ toIdr($item->total) }}) {{ $item->produk->nama }}: {{ $item->jumlah }}
                            @ {{ toIdr($item->harga) }}</li>
                    @endforeach
                </td>
                
                <td>{{ $penjualan->status }}</td>
                <td>{{ $penjualan->catatan }}</td>
                <td>{{ $penjualan->created_at }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection