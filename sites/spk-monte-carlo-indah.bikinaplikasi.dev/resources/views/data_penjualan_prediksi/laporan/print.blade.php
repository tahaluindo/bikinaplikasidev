    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN DATA PENJUALAN PREDIKSI</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Produk Id</th><th>Taun Id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_penjualan_prediksis as $data_penjualan_prediksi)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $data_penjualan_prediksi->produk_id }}</td>
<td>{{ $data_penjualan_prediksi->taun_id }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection