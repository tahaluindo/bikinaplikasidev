@extends('layouts.print')

@section('judul-laporan')
    <h3 align="center">LAPORAN genre</h3>
@endsection

@section('periode-laporan')
    <h3 align="center">{{ \Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y") }}
        S/d {{ \Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y") }}</h3>
@endsection

@section('content')

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Perhitungan Id</th>
            <th>Nama</th>
            <th>No Identitas</th>
            <th>Alamat</th>
            <th>No Hp</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genre as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->perhitungan->nama }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_identitas }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
