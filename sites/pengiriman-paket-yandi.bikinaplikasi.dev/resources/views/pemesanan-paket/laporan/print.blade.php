@extends('layouts.print')

@section('content')

    <h3 align="center">
        LAPORAN {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>

    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User</th>
            <th>Paket</th>
            <th>B. Transfer</th>
            <th>Total Bayar</th>
            <th>Refund</th>
            <th>Status</th>
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
                <td>
                    <a href="{{ url($item->bukti_transfer) }}">
                        <img src="{{ url($item->bukti_transfer ?? "image/no_image.png") }}" width="100">
                    </a>
                </td>
                <td>{{ toIdr($item->total_bayar) }}</td>
                <td>{{ toIdr($item->refund) }}</td>
                <td>{{ $item->status }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
