@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Expire At</th><th>Harga Beli</th><th>Harga Jual</th><th>Stok</th><th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $produk->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->expire_at }}</td><td>{{ $item->harga_beli }}</td><td>{{ $item->harga_jual }}</td><td>{{ $item->stok }}</td><td>{{ $item->gambar }}</td>
        </tr>
    </tbody>
</table>
@endsection