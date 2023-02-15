@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pelanggan Id</th><th>Kavling Id</th><th>Cara Pembayaran</th><th>Lama Angsuran</th><th>Batas Pembayaran</th><th>Dp</th><th>Biaya Ppjb</th><th>Biaya Shm</th><th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $penjualan->id }}'>
            <td>{{ $item->pelanggan_id }}</td><td>{{ $item->kavling_id }}</td><td>{{ $item->cara_pembayaran }}</td><td>{{ $item->lama_angsuran }}</td><td>{{ $item->batas_pembayaran }}</td><td>{{ $item->dp }}</td><td>{{ $item->biaya_ppjb }}</td><td>{{ $item->biaya_shm }}</td><td>{{ $item->catatan }}</td>
        </tr>
    </tbody>
</table>
@endsection