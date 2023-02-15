@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN SISWA</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr>
        </thead>
        <tbody>
        @foreach($siswas as $siswa)
            <tr>
                <th>{{ $loop->iteration }}.</th>

                <td>{{ $siswa->nama }}</td>

                <td>{{ $siswa->jenis_kelamin }}</td>

                <td>{{ $siswa->alamat }}</td>

                <td>{{ $siswa->no_hp }}</td>

                <td>{{ $siswa->status }}</td>

                <td>{{ $siswa->created_at }}</td>

                <td>{{ $siswa->updated_at }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection