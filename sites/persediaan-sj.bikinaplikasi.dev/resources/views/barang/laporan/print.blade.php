@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN BARANG</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Expire At</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Gambar</th>

        </tr>
        </thead>
        <tbody>
        @foreach($barangs as $barang)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $barang->id }}</td>

                <td>{{ $barang->nama }}</td>

                <td>{{ $barang->expire_at }}</td>

                <td>{{ toIdr($barang->harga_beli) }}</td>

                <td>{{ toIdr($barang->harga_jual) }}</td>

                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->satuan }}</td>

                <td>
                    <a href="{{ url($barang->gambar) }}">
                        <img src="{{ url($barang->gambar) }}" alt="" srcset="" width="50" height="50">
                    </a>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection