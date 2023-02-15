@extends('layouts.print')

@section('content')

<h3 align="center">LAPORAN BUKU</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th>
            <th>Jumlah Berkunjung</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>

    <tbody>
        @foreach($buku_tamus as $buku_tamu)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $buku_tamu->anggota->nama }}</td>
            <td>{{ $buku_tamu->jumlah_berkunjung }}</td>
            <td>{{ $buku_tamu->created_at }}</td>
            <td>{{ $buku_tamu->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
