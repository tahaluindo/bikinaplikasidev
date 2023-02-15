@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PENGELUARAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pengeluarans as $pengeluaran)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ toIdr($pengeluaran->jumlah) }}</td>

                <td>{{ $pengeluaran->tanggal }}</td>

                <td>{{ $pengeluaran->keterangan }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection