@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN BARANG</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Jenis Id</th>
            <th>Satuan Id</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Umur Manfaat</th>
            <th>Harga Per Unit</th>
            <th>Nilai Perolehan</th>
            <th>Penyusutan Per Tahun</th>
            <th>Kondisi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($barangs as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->jenis->keterangan }}</td>
                <td>{{ $item->satuan->nama }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->umur_manfaat }}</td>
                <td>{{ toIdr($item->harga_per_unit) }}</td>
                <td>{{ toIdr($item->nilai_perolehan) }}</td>
                <td>{{ $item->penyusutan_per_tahun }}</td>
                <td>{{ $item->kondisi }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection