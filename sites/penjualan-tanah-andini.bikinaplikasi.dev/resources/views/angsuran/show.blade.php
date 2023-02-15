@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pelanggan Id</th><th>Penjualan Id</th><th>Angsuran Ke</th><th>Jumlah</th><th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $angsuran->id }}'>
            <td>{{ $item->pelanggan_id }}</td><td>{{ $item->penjualan_id }}</td><td>{{ $item->angsuran_ke }}</td><td>{{ $item->jumlah }}</td><td>{{ $item->tanggal }}</td>
        </tr>
    </tbody>
</table>
@endsection