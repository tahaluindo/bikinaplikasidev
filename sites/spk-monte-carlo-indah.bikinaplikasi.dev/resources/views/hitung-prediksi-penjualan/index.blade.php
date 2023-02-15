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
        </tr>
    </thead>
    <tbody>
        @if(request()->tahun_id)
        @foreach ($data_penjualan_aktual_detail_prediksis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tahun }}</td>
                <td>{{ $item['bulan'] }}</td>
                <td>{{ $produk }}</td>
                <td>{{ number_format($item['volume'], 2, ',', '.') }}</td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>

@endsection