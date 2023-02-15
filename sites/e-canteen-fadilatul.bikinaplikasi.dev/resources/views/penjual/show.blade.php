@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>User Id</th><th>Deskripsi</th><th>Gambar Depan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $penjual->id }}'>
            <td>{{ $item->user_id }}</td><td>{{ $item->deskripsi }}</td><td>{{ $item->gambar_depan }}</td>
        </tr>
    </tbody>
</table>
@endsection