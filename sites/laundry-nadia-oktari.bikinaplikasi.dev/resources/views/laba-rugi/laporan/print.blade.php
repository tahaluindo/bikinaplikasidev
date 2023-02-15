@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN LABA / RUGI</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Tanggal</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
        </tr>
        </thead>
        <tbody>
        @foreach($laporans as $item)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $item['tanggal'] }}</td>

                <td>{{ toIdr($item['pesanan']) }}</td>
                <td>{{ toIdr($item['pengeluaran']) }}</td>
            </tr>
        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>{{ toIdr(collect($laporans)->sum('pesanan')) }}</td>
                <td>{{ toIdr(collect($laporans)->sum('pengeluaran')) }}</td>
            </tr>
        </tbody>
    </table>
@endsection