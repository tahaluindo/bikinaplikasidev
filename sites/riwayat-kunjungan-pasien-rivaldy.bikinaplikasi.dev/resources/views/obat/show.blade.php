@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $obat->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->deskripsi }}</td>
        </tr>
    </tbody>
</table>
@endsection