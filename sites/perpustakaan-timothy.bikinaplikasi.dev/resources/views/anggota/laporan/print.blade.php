@extends('layouts.print')

@section('content')

<h3 align="center">LAPORAN ANGGOTA</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>No induk</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Dibuat</th>
        </tr>
    </thead>

    <tbody>
        @foreach($anggotas as $anggota)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $anggota->no_induk }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->jenis_kelamin }}</td>
            <td>{{ $anggota->alamat }}</td>
            <td>{{ $anggota->no_telepon }}</td>
            <td>{{ $anggota->status }}</td>
            <td>{{ $anggota->dibuat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection