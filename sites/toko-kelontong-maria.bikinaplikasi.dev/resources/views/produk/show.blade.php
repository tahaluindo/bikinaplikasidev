@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $produk->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->stok }}</td>
        </tr>
    </tbody>
</table>
@endsection