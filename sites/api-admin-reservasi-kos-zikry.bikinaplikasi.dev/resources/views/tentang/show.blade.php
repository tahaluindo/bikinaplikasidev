@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama Developer</th><th>Deskripsi</th><th>Versi</th><th>Email</th><th>No Hp</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $tentang->id }}'>
            <td>{{ $item->nama_developer }}</td><td>{{ $item->deskripsi }}</td><td>{{ $item->versi }}</td><td>{{ $item->email }}</td><td>{{ $item->no_hp }}</td>
        </tr>
    </tbody>
</table>
@endsection