@extends('layouts.app')
@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th>Pemilik</th>
            <th>Alamat Lengkap</th>
            <th>Alamat Gmaps</th>
            <th>Deskripsi</th>
            <th>No Hp</th>
            <th>Jumlah Kamar</th>
            <th>Fasilitas</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Harga Terendah</th>
            <th>Harga Tertinggi</th>
            <th>Harga Sewa Tahunan</th>
        </tr>
        </thead>
        <tbody>
        <tr data-id='{{ $kos->id }}'>
            <td>{{ $item->pemilik }}</td>
            <td>{{ $item->alamat_lengkap }}</td>
            <td>{{ $item->alamat_gmaps }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->jumlah_kamar }}</td>
            <td>{{ $item->fasilitas }}</td>
            <td>{{ $item->gambar }}</td>
            <td>{{ $item->kategori }}</td>
            <td>{{ $item->harga_terendah }}</td>
            <td>{{ $item->harga_tertinggi }}</td>
            <td>{{ $item->harga_sewa_tahunan }}</td>
        </tr>
        </tbody>
    </table>
@endsection