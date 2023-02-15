@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Produk Id</th><th>Tahun Id</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $datapenjualanprediksi->id }}'>
            <td>{{ $item->produk_id }}</td><td>{{ $item->tahun_id }}</td>
        </tr>
    </tbody>
</table>
@endsection