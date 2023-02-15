@extends('layouts.print')

@section('judul-laporan')
<h3 align="center">LAPORAN ANGGOTA</h3>
@endsection

@section('periode-laporan')
<h3 align="center">{{ \Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y") }} S/d {{ \Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y") }}</h3>
@endsection

@section('content')

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id anggota</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Tipe Anggota</th>
            <th>Status</th>
            <th>Dibuat</th>
        </tr>
    </thead>

    <tbody>
        @foreach($anggotas as $anggota)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $anggota->no_identitas }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->jenis_kelamin }}</td>
            <td>{{ $anggota->alamat }}</td>
            <td>{{ $anggota->no_telepon }}</td>
            <td>{{ $anggota->user ? $anggota->user->level : "" }}</td>
            <td>{{ $anggota->status }}</td>
            <td>{{ $anggota->dibuat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
