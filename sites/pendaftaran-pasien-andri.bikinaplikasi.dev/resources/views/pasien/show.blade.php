@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Umur</th><th>Alamat</th><th>Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $pasien->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->umur }}</td><td>{{ $item->alamat }}</td><td>{{ $item->jenis_kelamin }}</td>
        </tr>
    </tbody>
</table>
@endsection