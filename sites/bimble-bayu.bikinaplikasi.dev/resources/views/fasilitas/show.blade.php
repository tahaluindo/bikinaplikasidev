@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $fasilitas->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->gambar }}</td>
        </tr>
    </tbody>
</table>
@endsection