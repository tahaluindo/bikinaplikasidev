@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Guru Id</th>
            <th>Mapel Id</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $mapel_detail->id }}'>
            <td>{{ $item->guru_id }}</td>
            <td>{{ $item->mapel_id }}</td>
        </tr>
        </tbody>
    </table>
@endsection