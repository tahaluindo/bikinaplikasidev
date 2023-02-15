@extends('layouts.print')

@section('content')

    <h3 align="center">LAPORAN ANGGOTA</h3>

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>No identitas</th>
            <th>Email</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Level</th>
            <th>Dibuat</th>
        </tr>
        </thead>

        <tbody>
        @foreach($anggotas as $anggota)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->no_identitas }}</td>
                <td>{{ $item->user ? $item->user->email : "" }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telepon }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->user ? $item->user->level : "" }}</td>
                <td>{{ \Carbon\Carbon::parse($item->dibuat)->format('y-M-D') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
