@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $pengeluaran->id }}'>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->keterangan }}</td>
        </tr>
        </tbody>
    </table>
@endsection