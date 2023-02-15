@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Penyakit Id</th><th>Obat Id</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $saranobat->id }}'>
            <td>{{ $item->penyakit_id }}</td><td>{{ $item->obat_id }}</td>
        </tr>
    </tbody>
</table>
@endsection