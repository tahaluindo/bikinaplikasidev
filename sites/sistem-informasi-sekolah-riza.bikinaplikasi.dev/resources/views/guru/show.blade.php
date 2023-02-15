@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nip</th><th>Nama</th><th>Jenis Kelamin</th><th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $guru->id }}'>
            <td>{{ $item->nip }}</td><td>{{ $item->nama }}</td><td>{{ $item->jenis_kelamin }}</td><td>{{ $item->alamat }}</td>
        </tr>
    </tbody>
</table>
@endsection