@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PRODUK</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th class="border">Kategori Id</th>
            <th class="border">Nama</th>
            <th class="border">Expire At</th>
            <th class="border">Harga Jual</th>
            <th class="border">Stok</th>
            <th class="border">Gambar</th>

        </tr>
        </thead>
        <tbody>
        @foreach($produks as $produk)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td class="border">{{ $item->kategori->nama }}</td>
                <td class="border">{{ $item->nama }}</td>
                <td class="border">{{ $item->expire_at }}</td>
                <td class="border">{{ toIdr($item->harga_jual) }}</td>
                <td class="border">{{ $item->stok }}</td>
                <td class="border">
                    <a href="{{ url($item->gambar) }}">
                        <img src="{{ url($item->gambar) }}" alt="" srcset="" width="50" height="50">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection