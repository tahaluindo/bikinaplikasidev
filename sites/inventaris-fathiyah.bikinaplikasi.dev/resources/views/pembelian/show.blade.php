@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Barang Id</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $pembelian->id }}'>
            <td>{{ $item->barang_id }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->tanggal }}</td>
        </tr>
        </tbody>
    </table>
@endsection