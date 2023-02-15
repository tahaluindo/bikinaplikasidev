@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN MAP</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th>
            <th>Jenis</th>
            <th>Nama</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Lat</th>
            <th>Lng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($maps as $map)
            <tr>
                <th>
                    {{ $loop->iteration }}
                </th>

                <td>{{ $item->id }}</td>
                <td>{{ $item->jenis->nama }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->lat }}</td>
                <td>{{ $item->lng }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection