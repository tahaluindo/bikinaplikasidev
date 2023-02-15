@extends('layouts.print')

@section('judul-laporan')
<h3 align="center">LAPORAN PENGEMBALIAN BUKU</h3>
@endsection

@section('periode-laporan')
<h3 align="center">{{ \Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y") }} S/d {{ \Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y") }}</h3>
@endsection

@section('content')

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Peminjaman Id</th>
            <th>Tanggal</th>
            <th>Denda Terlambat</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Jatuh Tempo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengembalians as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $item->peminjaman->anggota->nama }}

                @foreach ($item->peminjaman->detail_peminjaman as $detail_peminjaman_item)
                    <ul style="margin: 5px 0;">
                        <li> {{ $detail_peminjaman_item->buku->judul }} </li>
                    </ul>
                @endforeach
            </td>

            <td>{{ $item->tanggal }}</td>
            <td>{{ toIdr($item->denda_terlambat ?? 0) }}</td>
            <td>{{ $item->peminjaman->tanggal }}</td>
            <td>{{ $item->peminjaman->tanggal_pengembalian }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
