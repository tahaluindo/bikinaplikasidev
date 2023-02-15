@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nomor</th><th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $antrian->id }}'>
            <td>{{ $item->nomor }}</td><td>{{ $item->status }}</td>
        </tr>
    </tbody>
</table>
@endsection