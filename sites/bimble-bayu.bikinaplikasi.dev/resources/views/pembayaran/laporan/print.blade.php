@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PEMBAYARAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Jenjang</th>
            <th>Kelas</th>
            {{-- <th>Angkatan</th> --}}
            <th>untuk bulan</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pembayarans as $pembayaran)
            <tr>
                <th>{{ $loop->iteration }}.</th>

                <td>{{ $pembayaran->jenjang->nama }}</td>

                <td>{{ $pembayaran->kelas->nama }}</td>

                {{-- <td>{{ $pembayaran->angkatan }}</td> --}}

                <td>{{ $pembayaran->untuk_bulan }}</td>

                <td>{{ $pembayaran->created_at }}</td>

                <td>{{ $pembayaran->updated_at }}</td>
            </tr>

            @forelse($pembayaran->pembayaran_details as $item)
                <tr>
                    <td colspan="7">
                        {{ $item->siswa->nama }} @ {{ toIdr($item->jumlah) }}<br>
                        {{ $item->catatan }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        Belum ada data pembayaran
                    </td>
                </tr>
            @endforelse
        @endforeach
        </tbody>
    </table>
@endsection