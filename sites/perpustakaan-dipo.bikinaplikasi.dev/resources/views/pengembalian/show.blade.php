@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Peminjaman Id</th>
            <th>Tanggal</th>
            <th>Denda Terlambat</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $pengembalian->id }}'>
            <td>{{ $item->peminjaman_id }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->denda_terlambat }}</td>
        </tr>
    </tbody>
</table>
@endsection