@extends('layouts.print')

@section('content')

<h3 align="center">LAPORAN PEMINJAMAN</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Anggota Id</th>
            <th>User Petugas Id</th>
            <th>Tanggal</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Diganti Pada</th>
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

            <td>{{ $peminjaman->status }}</td>
            <td>{{ $peminjaman->diganti_pada }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
