@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Jk</th><th>Ttl</th><th>Alamat</th><th>No Hp</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $anakasuh->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->jk }}</td><td>{{ $item->ttl }}</td><td>{{ $item->alamat }}</td><td>{{ $item->no_hp }}</td>
        </tr>
    </tbody>
</table>
@endsection