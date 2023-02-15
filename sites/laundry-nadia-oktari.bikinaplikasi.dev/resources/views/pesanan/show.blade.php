@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pelanggan Id</th><th>Dipesan Pada</th><th>Diambil Pada</th><th>Status</th><th>Admin</th><th>Diskon</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $pesanan->id }}'>
            <td>{{ $item->pelanggan_id }}</td><td>{{ $item->dipesan_pada }}</td><td>{{ $item->diambil_pada }}</td><td>{{ $item->status }}</td><td>{{ $item->admin }}</td><td>{{ $item->diskon }}</td>
        </tr>
    </tbody>
</table>
@endsection