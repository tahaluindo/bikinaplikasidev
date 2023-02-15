@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN JENIS</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th>
            <th>Nama</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jeniss as $jenis)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $jenis->id }}</td>
                <td>{{ $jenis->nama }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection