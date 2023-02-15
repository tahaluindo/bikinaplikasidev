@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $tahun->id }}'>
            <td>{{ $item->tahun }}</td>
        </tr>
    </tbody>
</table>
@endsection