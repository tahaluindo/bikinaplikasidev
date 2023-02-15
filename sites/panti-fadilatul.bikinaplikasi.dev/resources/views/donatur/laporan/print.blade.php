@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN DONATUR</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th>
            <th>No Hp</th>
            <th>Nama Pemilik Rekening</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Pesan</th>

        </tr>
        </thead>
        <tbody>
        @foreach($donaturs as $donatur)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $donatur->nama }}</td>
                <td>{{ $donatur->no_hp }}</td>

                <td>{{ $donatur->nama_pemilik_rekening }}</td>

                <td>{{ toIdr($donatur->jumlah) }}</td>

                <td>{{ $donatur->tanggal }}</td>

                <td>{{ $donatur->pesan }}</td>
            </tr>
        @endforeach
        
        <tr>
                <th>Total</th>
                <td></td>
                <td></td>

                <td></td>

                <td>{{ toIdr($donaturs->sum('jumlah')) }}</td>

                <td></td>

                <td></td>
            </tr>
        </tbody>
    </table>
@endsection