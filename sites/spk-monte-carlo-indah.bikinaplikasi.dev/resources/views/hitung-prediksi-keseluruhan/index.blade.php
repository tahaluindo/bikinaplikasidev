@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>No</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Nama</th>
            <th>Volume</th>
            <th>Harga Per Kg</th>
            <th>Nilai Rp</th>
        </tr>
    </thead>
    <tbody>
        @if(request()->tahun_id)
        @foreach ($data_penjualan_detail_prediksis_harga_per_kg as $key => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tahun }}</td>
                <td>{{ $item['bulan'] }}</td>
                <td>{{ $produk }}</td>
                <td>{{ toIdr($data_penjualan_detail_prediksis_volume[$key]['volume']) }}</td>
                <td>{{ toIdr($item['harga_per_kg']) }}</td>
                <td>{{ toIdr($item['harga_per_kg'] * $data_penjualan_detail_prediksis_volume[$key]['volume']) }}</td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>

@endsection