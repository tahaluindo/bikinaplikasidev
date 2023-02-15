@extends('layouts.print')

@section('content')

    <h3 align="center">
        LAPORAN {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>

    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User</th>
            <th>Tiket</th>
            <th>Jumlah</th>
            <th>B. Pada</th>
            <th>B. Transfer</th>
            <th>Pulang Pergi</th>
            <th>Total Bayar</th>
            <th>Refund</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservasi_tikets as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->user->name ?? "" }}</td>
                <td>{{ $item->tiket->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->berakhir_pada }}</td>
                <td>
                    <a href="{{ url($item->bukti_transfer) }}">
                        <img src="{{ url($item->bukti_transfer ?? "image/no_image.png") }}" width="100">
                    </a>
                </td>
                <td>{{ $item->pulang_pergi }}</td>
                <td>{{ toIdr($item->total_bayar) }}</td>
                <td>{{ toIdr($item->refund) }}</td>
                <td>{{ $item->status }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
