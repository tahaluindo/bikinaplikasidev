@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Pembelian Id</th>
            <th>Bahan Id</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $pembelian_detail->id }}'>
            <td>{{ $item->pembelian_id }}</td>
            <td>{{ $item->bahan_id }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->total }}</td>
        </tr>
        </tbody>
    </table>
@endsection