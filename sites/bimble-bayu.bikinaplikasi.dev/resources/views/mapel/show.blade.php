@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $mapel->id }}'>
            <td>{{ $item->nama }}</td>
        </tr>
    </tbody>
</table>
@endsection