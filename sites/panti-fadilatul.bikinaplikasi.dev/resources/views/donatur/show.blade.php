@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Nama</th><th>Nama Pemilik Rekening</th><th>Jumlah</th><th>Tanggal</th><th>Pesan</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $donatur->id }}'>
            <td>{{ $item->nama }}</td><td>{{ $item->nama_pemilik_rekening }}</td><td>{{ $item->jumlah }}</td><td>{{ $item->tanggal }}</td><td>{{ $item->pesan }}</td>
        </tr>
    </tbody>
</table>
@endsection