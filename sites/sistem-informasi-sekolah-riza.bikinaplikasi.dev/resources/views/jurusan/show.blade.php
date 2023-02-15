@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $jurusan->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->keterangan }}</td>
        </tr>
    </tbody>
</table>
@endsection