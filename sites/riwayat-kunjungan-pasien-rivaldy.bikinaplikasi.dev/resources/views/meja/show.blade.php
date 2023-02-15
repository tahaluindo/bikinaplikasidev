@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>No</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $meja->id }}'>
            <td>{{ $item->no }}</td>
        </tr>
    </tbody>
</table>
@endsection