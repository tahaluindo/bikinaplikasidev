@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PENYUSUTAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Barang Id</th>
            <th>Tahun ke</th>
            <th>Jumlah</th>

        </tr>
        </thead>
        <tbody>
        @foreach($penyusutans as $penyusutan)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $penyusutan->barang->nama }}</td>
                <td>{{ $penyusutan->tahun_ke }}</td>
                <td>{{ toIdr($penyusutan->jumlah) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection