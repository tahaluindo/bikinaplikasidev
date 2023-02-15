@extends('layouts.print')

@section('content')

<h3 align="center">LAPORAN BUKU</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
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
