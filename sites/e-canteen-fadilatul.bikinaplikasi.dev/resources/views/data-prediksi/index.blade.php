@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>No</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Nama</th>
            <th>Harga Per Kg</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_penjualan_detail_prediksis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->data_penjualan_prediksi->tahun->tahun }}</td>
                <td>{{ $item->bulan }}</td>
                <td>{{ $item->data_penjualan_prediksi->produk->nama }}</td>
                <td>{{ $item->harga_per_kg }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection