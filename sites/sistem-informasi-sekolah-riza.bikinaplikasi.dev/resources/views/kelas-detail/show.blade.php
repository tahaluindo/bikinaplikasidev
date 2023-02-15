@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Kelas Id</th>
            <th>Siswa Id</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $kelasdetail->id }}'>
            <td>{{ $item->kelas_id }}</td>
            <td>{{ $item->siswa_id }}</td>
        </tr>
        </tbody>
    </table>
@endsection