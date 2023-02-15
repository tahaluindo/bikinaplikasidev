@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN KOS</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Pemilik</th>
            <th>Alamat Lengkap</th>
            <th>Alamat Gmaps</th>
            <th>Deskripsi</th>
            <th>No Hp</th>
            <th>Jumlah Kamar</th>
            <th>Fasilitas</th>
            <th>Gambar</th>
            <th>Gambar 2</th>
            <th>Gambar 3</th>
            <th>Gambar 4</th>
            <th>Gambar 5</th>
            <th>Kategori</th>
            <th>Harga Terendah</th>
            <th>Harga Tertinggi</th>
            <th>Kamar Kosong</th>

        </tr>
        </thead>
        <tbody>
        @foreach($koss as $kos)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $kos->nama }}</td>
                <td>{{ $kos->created_at }}</td>

                <td>{{ $kos->updated_at }}</td>

                <td>{{ $kos->pemilik }}</td>

                <td>{{ $kos->alamat_lengkap }}</td>

                <td>{{ $kos->alamat_gmaps }}</td>

                <td>{{ $kos->deskripsi }}</td>

                <td>{{ $kos->no_hp }}</td>

                <td>{{ $kos->jumlah_kamar }}</td>

                <td>{{ $kos->fasilitas }}</td>

                <td>{{ $kos->gambar }}</td>
{{--                <td>{{ $kos->gambar2 }}</td>--}}
{{--                <td>{{ $kos->gambar3 }}</td>--}}
{{--                <td>{{ $kos->gambar4 }}</td>--}}
{{--                <td>{{ $kos->gambar5 }}</td>--}}

                <td>{{ $kos->kategori }}</td>

                <td>{{ toIdr($item->harga_terendah) }}</td>
                <td>{{ toIdr($item->harga_tertinggi) }}</td>
                <td>{{ $kos->kamar_kosong }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection