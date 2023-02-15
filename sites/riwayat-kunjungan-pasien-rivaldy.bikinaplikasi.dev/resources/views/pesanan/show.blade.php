@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Penjual Id</th><th>Meja Id</th><th>Atas Nama</th><th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $pesanan->id }}'>
            <td>{{ $item->penjual_id }}</td><td>{{ $item->meja_id }}</td><td>{{ $item->atas_nama }}</td><td>{{ $item->status }}</td>
        </tr>
    </tbody>
</table>
@endsection