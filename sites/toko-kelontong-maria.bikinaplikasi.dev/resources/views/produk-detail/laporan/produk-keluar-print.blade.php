@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PRODUK DETAIL</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Produk Id</th>
            <th>Jumlah</th>
            <th>Harga Jual</th>
            <th>Tanggal</th>

        </tr>
        </thead>
        <tbody>
        @foreach($produk_details as $produk_detail)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $produk_detail->produk->nama }}</td>

                <td>{{ $produk_detail->jumlah }}</td>

                <td>{{ toIdr($produk_detail->harga_jual) }}</td>

                <td>{{ $produk_detail->tanggal }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection