@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Penjual Id</th><th>Nama</th><th>Harga</th><th>Deskripsi</th><th>Stok</th><th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $menu->id }}'>
            <td>{{ $item->penjual_id }}</td><td>{{ $item->nama }}</td><td>{{ $item->harga }}</td><td>{{ $item->deskripsi }}</td><td>{{ $item->stok }}</td><td>{{ $item->gambar }}</td>
        </tr>
    </tbody>
</table>
@endsection