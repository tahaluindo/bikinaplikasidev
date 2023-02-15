@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pemasok Id</th><th>Status</th><th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $pembelian->id }}'>
            <td>{{ $item->pemasok_id }}</td><td>{{ $item->status }}</td><td>{{ $item->catatan }}</td>
        </tr>
    </tbody>
</table>
@endsection