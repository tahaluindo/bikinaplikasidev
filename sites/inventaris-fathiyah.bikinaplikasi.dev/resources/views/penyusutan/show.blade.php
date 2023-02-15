@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Barang Id</th><th>Tahun ke</th><th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $penyusutan->id }}'>
            <td>{{ $item->barang_id }}</td><td>{{ $item->tahun_ke }}</td><td>{{ $item->jumlah }}</td>
        </tr>
    </tbody>
</table>
@endsection