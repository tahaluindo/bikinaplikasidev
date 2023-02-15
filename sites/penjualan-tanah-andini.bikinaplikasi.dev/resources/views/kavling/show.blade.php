@extends('layouts.app')
@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th>Kategori Id</th><th>Luas Tanah</th><th>Nomor Kavling</th><th>Harga</th><th>Angsuran</th><th>Ukuran</th><th>Tipe</th><th>No Ppjb</th><th>No Ajb</th><th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id='{{ $kavling->id }}'>
            <td>{{ $item->kategori_id }}</td><td>{{ $item->luas_tanah }}</td><td>{{ $item->nomor_kavling }}</td><td>{{ $item->harga }}</td><td>{{ $item->angsuran }}</td><td>{{ $item->ukuran }}</td><td>{{ $item->tipe }}</td><td>{{ $item->no_ppjb }}</td><td>{{ $item->no_ajb }}</td><td>{{ $item->status }}</td>
        </tr>
    </tbody>
</table>
@endsection