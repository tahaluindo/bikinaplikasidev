@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Detail Penjualan Aktual Id</th><th>Volume Januari</th><th>Volume Februari</th><th>Volume Maret</th><th>Volume April</th><th>Volume Mei</th><th>Volume Juni</th><th>Volume Juli</th><th>Volume Agustus</th><th>Volume September</th><th>Volume Oktober</th><th>Volume November</th><th>Volume Desember</th><th>Harga Per Kg Januari</th><th>Harga Per Kg Februari</th><th>Harga Per Kg Maret</th><th>Harga Per Kg April</th><th>Harga Per Kg Mei</th><th>Harga Per Kg Juni</th><th>Harga Per Kg Juli</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $data_penjualan_aktual_detail->id }}'>
            <td>{{ $item->detail_penjualan_aktual_id }}</td><td>{{ $item->volume_januari }}</td><td>{{ $item->volume_februari }}</td><td>{{ $item->volume_maret }}</td><td>{{ $item->volume_april }}</td><td>{{ $item->volume_mei }}</td><td>{{ $item->volume_juni }}</td><td>{{ $item->volume_juli }}</td><td>{{ $item->volume_agustus }}</td><td>{{ $item->volume_september }}</td><td>{{ $item->volume_oktober }}</td><td>{{ $item->volume_november }}</td><td>{{ $item->volume_desember }}</td><td>{{ $item->harga_per_kg_januari }}</td><td>{{ $item->harga_per_kg_februari }}</td><td>{{ $item->harga_per_kg_maret }}</td><td>{{ $item->harga_per_kg_april }}</td><td>{{ $item->harga_per_kg_mei }}</td><td>{{ $item->harga_per_kg_juni }}</td><td>{{ $item->harga_per_kg_juli }}</td>
        </tr>
    </tbody>
</table>
@endsection