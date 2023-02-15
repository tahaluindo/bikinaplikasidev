@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN BAHAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th>
            <th>Harga Beli</th>
            <th>Stok</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bahans as $bahan)
            <tr>
                <th>{{ $loop->iteration }}.</th>

                <td>{{ $bahan->nama }}</td>

                <td>{{ toIdr($bahan->harga_beli) }}</td>
                <td>{{ $bahan->stok }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection