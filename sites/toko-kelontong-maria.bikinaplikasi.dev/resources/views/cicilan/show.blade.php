@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Tagihan Id</th><th>Jumlah</th><th>Cicilan Ke</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $cicilan->id }}'>
            <td>{{ $item->tagihan_id }}</td><td>{{ $item->jumlah }}</td><td>{{ $item->cicilan_ke }}</td>
        </tr>
    </tbody>
</table>
@endsection