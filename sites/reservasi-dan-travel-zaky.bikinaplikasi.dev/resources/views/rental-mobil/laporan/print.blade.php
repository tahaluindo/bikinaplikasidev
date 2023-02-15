@extends('layouts.print')

@section('content')

    <h3 align="center">
        LAPORAN {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>

    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User</th>
            <th>Mobil</th>
            <th>Supir</th>
            <th>Dari Tanggal</th>
            <th>Sampai Tanggal</th>
            <th>B. Supir</th>
            <th>Total Bayar</th>
            <th>B. Transfer</th>
            <th>Refund</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rental_mobils as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->user->name ?? "" }}</td>
                <td>{{ $item->mobil->nama }}</td>
                <td>{{ $item->supir->name ?? "" }}</td>
                <td>{{ $item->dari_tanggal }}</td>
                <td>{{ $item->sampai_tanggal }}</td>
                <td>{{ $item->biaya_supir }}</td>
                <td>{{ toIdr($item->total_bayar) }}</td>
                <td>
                    <a href="{{ url($item->bukti_transfer) }}">
                        <img src="{{ url($item->bukti_transfer) }}" width="100">
                    </a>
                </td>
                <td>{{ toIdr($item->refund) }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
