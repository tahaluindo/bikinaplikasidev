@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>User Id</th><th>Kos Id</th><th>Komentar</th><th>Disukai</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $disukai->id }}'>
            <td>{{ $item->user_id }}</td><td>{{ $item->kos_id }}</td><td>{{ $item->komentar }}</td><td>{{ $item->disukai }}</td>
        </tr>
    </tbody>
</table>
@endsection