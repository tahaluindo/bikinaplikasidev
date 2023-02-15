@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Buku Id</th><th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $detail_peminjaman->id }}'>
            <td>{{ $item->buku_id }}</td><td>{{ $item->status }}</td>
        </tr>
    </tbody>
</table>
@endsection