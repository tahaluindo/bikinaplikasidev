@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Satuan</th><th>Harga</th><th>Minimal</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $paket->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->satuan }}</td><td>{{ $item->harga }}</td><td>{{ $item->minimal }}</td>
        </tr>
    </tbody>
</table>
@endsection