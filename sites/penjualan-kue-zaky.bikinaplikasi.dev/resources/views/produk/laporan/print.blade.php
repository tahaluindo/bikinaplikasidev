@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PRODUK</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Expire At</th>
{{--            <th>Harga Beli</th>--}}
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Gambar</th>

        </tr>
        </thead>
        <tbody>
        @foreach($produks as $produk)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $produk->id }}</td>

                <td>{{ $produk->nama }}</td>

                <td>{{ $produk->expire_at }}</td>

{{--                <td>{{ toIdr($produk->harga_beli) }}</td>--}}

                <td>{{ toIdr($produk->harga_jual) }}</td>

                <td>{{ $produk->stok }}</td>

                <td>
                    <a href="{{ url($produk->gambar) }}">
                        <img src="{{ url($produk->gambar) }}" alt="" srcset="" width="50" height="50">
                    </a>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection