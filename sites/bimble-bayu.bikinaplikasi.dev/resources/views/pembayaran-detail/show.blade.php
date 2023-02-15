@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Pembayaran Id</th>
            <th>Siswa Id</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $pembayarandetail->id }}'>
            <td>{{ $item->pembayaran_id }}</td>
            <td>{{ $item->siswa_id }}</td>
        </tr>
        </tbody>
    </table>
@endsection