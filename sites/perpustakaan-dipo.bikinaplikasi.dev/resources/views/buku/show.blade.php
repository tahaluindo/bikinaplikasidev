@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Kota</th><th>Stok</th><th>Ditambahkan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $buku->id }}'>
            <td>{{ $item->judul }}</td><td>{{ $item->penulis }}</td><td>{{ $item->penerbit }}</td><td>{{ $item->tahun }}</td><td>{{ $item->kota }}</td><td>{{ $item->stok }}</td><td>{{ $item->ditambahkan }}</td>
        </tr>
    </tbody>
</table>
@endsection