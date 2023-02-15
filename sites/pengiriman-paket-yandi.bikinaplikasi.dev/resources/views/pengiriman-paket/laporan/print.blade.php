@extends('layouts.print')

@section('content')

    <h3 align="center">
        LAPORAN {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>
    <h3 align="center">Periode {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h3>
    
    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User Id</th>
            <th>Paket Id</th>
            <th>Rute Id</th>
            <th>Jadwal Id</th>
            <th>Jumlah (KG)</th>
            <th>Total Bayar</th>
            <th>Refund</th>
            <th>Status</th>
            <th>Catatan</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pengiriman_pakets as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->user->name ?? "" }}</td>
                <td>{{ $item->paket->nama }}</td>
                <td>{{ $item->rute->dari()->nama }} - {{ $item->rute->ke()->nama }}</td>
                <td>{{ $item->jadwal->hari }} - {{ $item->jadwal->jam_mulai }} - {{ $item->jadwal->jam_akhir }} </td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ toIdr($item->total_bayar) }}</td>
                <td>{{ toIdr($item->refund) }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->catatan }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
