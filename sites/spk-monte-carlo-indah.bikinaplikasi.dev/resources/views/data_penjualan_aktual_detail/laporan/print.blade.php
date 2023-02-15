    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN DATA PENJUALAN AKTUAL DETAIL</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Detail Penjualan Prdiksi Id</th><th>Volume Januari</th><th>Volume Februari</th><th>Volume Maret</th><th>Volume April</th><th>Volume Mei</th><th>Volume Juni</th><th>Volume Juli</th><th>Volume Agustus</th><th>Volume September</th><th>Volume Oktober</th><th>Volume Desember</th><th>Harga Per Kg Januari</th><th>Harga Per Kg Februari</th><th>Harga Per Kg Maret</th><th>Harga Per Kg April</th><th>Harga Per Kg Mei</th><th>Harga Per Kg Juni</th><th>Harga Per Kg Juli</th><th>Harga Per Kg Agustus</th><th>Harga Per Kg September</th><th>Harga Per Kg Oktober</th><th>Harga Per Kg November</th><th>Harga Per Kg Desember</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_penjualan_aktual_details as $data_penjualan_aktual_detail)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $data_penjualan_aktual_detail->detail_penjualan_prdiksi_id }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_januari }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_februari }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_maret }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_april }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_mei }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_juni }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_juli }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_agustus }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_september }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_oktober }}</td>
<td>{{ $data_penjualan_aktual_detail->volume_desember }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_januari }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_februari }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_maret }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_april }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_mei }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_juni }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_juli }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_agustus }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_september }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_oktober }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_november }}</td>
<td>{{ $data_penjualan_aktual_detail->harga_per_kg_desember }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection