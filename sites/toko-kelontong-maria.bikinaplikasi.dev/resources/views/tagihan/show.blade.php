@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pembeli Id</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $tagihan->id }}'>
            <td>{{ $item->pembeli_id }}</td>
        </tr>
    </tbody>
</table>
@endsection