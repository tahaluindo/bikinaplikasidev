@extends('layouts.print')

@section('judul-laporan')
<h3 align="center">LAPORAN PEMINJAMAN BUKU</h3>
@endsection

@section('periode-laporan')
<h3 align="center">{{ \Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y") }} S/d {{ \Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y") }}</h3>
@endsection

@section('content')

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Anggota Id</th>
            <th>User Petugas Id</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Hari Telat</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($peminjamans as $peminjaman)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>
                {{ $peminjaman->anggota->nama }} <br>

                @foreach ($peminjaman->detail_peminjaman as $item)
                    <ul style="margin: 5px 0;">
                        <li> {{ $item->buku->judul }} </li>
                    </ul>
                @endforeach
            </td>

            <td>{{ $peminjaman->user_petugas->name }}</td>

            <td>{{ $peminjaman->tanggal }}</td>

            <td>{{ $peminjaman->tanggal_pengembalian }}</td>

            <td>
                @if($peminjaman->status == 'Berlangsung' && $peminjaman->tanggal_pengembalian < date("Y-m-d"))
                {{ now()->diffInDays(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)) }}
                @else
                0
                @endif
            </td>
            <td>{{ $peminjaman->status }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
