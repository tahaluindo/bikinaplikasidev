@extends('layouts.print')

@section('judul-laporan')
    <h3 align="center">LAPORAN perhitungan</h3>
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
            <th>perhitungan Id</th>
            <th>Kriteria Detail Id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($perhitungan as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->perhitungan->nama }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
