@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN ANGSURAN</h3>
    
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Penjualan Id</th>
            <th>Angsuran Ke</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($angsurans as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->penjualan->id }} ({{ $item->penjualan->pelanggan->nama }})</td>
                <td>{{ $item->angsuran_ke }}</td>
                <td>{{ toIdr($item->jumlah) }}</td>
                <td>{{ $item->tanggal }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection