@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pesanan Id</th><th>Paket Id</th><th>Jumlah</th><th>Harga</th><th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $pesanandetail->id }}'>
            <td>{{ $item->pesanan_id }}</td><td>{{ $item->paket_id }}</td><td>{{ $item->jumlah }}</td><td>{{ $item->harga }}</td><td>{{ $item->total }}</td>
        </tr>
    </tbody>
</table>
@endsection