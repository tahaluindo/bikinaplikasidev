@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Penjualan Id</th>
            <th>Produk Id</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $penjualan_detail->id }}'>
            <td>{{ $item->penjualan_id }}</td>
            <td>{{ $item->produk_id }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->total }}</td>
        </tr>
        </tbody>
    </table>
@endsection