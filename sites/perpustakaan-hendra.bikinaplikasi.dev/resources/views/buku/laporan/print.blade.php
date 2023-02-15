@extends('layouts.print')

@section('judul-laporan')
<h3 align="center">LAPORAN BUKU</h3>
@endsection

@section('periode-laporan')
<h3 align="center">{{ \Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y") }} S/d {{ \Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y") }}</h3>
@endsection

@section('content')

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kota</th>
            <th>Stok</th>
            <th>Ditambahkan</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bukus as $buku)
        <tr>
            <th>{{ $loop->iteration }}.</th>

            <td>{{ $buku->kode_buku }} {{ $kode_buku->where('kode_start', "<=", $buku->kode_buku)->where('kode_end', ">=", $buku->kode_buku)->first() ? "(Ket: " . $kode_buku->where('kode_start', "<=", $buku->kode_buku)->where('kode_end', ">=", $buku->kode_buku)->first()->keterangan . ' | Rak: ' . $kode_buku->where('kode_start', "<=", $buku->kode_buku)->where('kode_end', ">=", $buku->kode_buku)->first()->lokasi_rak . ")" : "" }}</td>
            <td>{{ $buku->judul }}</td>

            <td>{{ $buku->penulis }}</td>

            <td>{{ $buku->penerbit }}</td>

            <td>{{ $buku->tahun }}</td>

            <td>{{ $buku->kota }}</td>

            <td>{{ $buku->stok }}</td>

            <td>{{ $buku->ditambahkan }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
