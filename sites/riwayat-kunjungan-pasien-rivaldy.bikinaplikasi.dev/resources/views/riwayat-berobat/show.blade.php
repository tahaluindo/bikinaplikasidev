@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Pasien Id</th><th>Penyakit Id</th><th>Catatan</th><th>Tanggal Berobat</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $riwayatberobat->id }}'>
            <td>{{ $item->pasien_id }}</td><td>{{ $item->penyakit_id }}</td><td>{{ $item->catatan }}</td><td>{{ $item->tanggal_berobat }}</td>
        </tr>
    </tbody>
</table>
@endsection