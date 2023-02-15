@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Pesan Kesan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $bukutamu->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->pesan_kesan }}</td>
        </tr>
    </tbody>
</table>
@endsection