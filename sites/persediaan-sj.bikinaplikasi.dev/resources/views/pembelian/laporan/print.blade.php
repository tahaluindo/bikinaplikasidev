@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN PEMBELIAN</h3>
    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Pemasok Id</th>
            <th>Status</th>
            <th>Catatan</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pembelians as $pembelian)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>
                    ({{ toIdr($pembelian->pembelian_details->sum('total')) }}) <strong>{{ $pembelian->pemasok->nama }}</strong>

                    @foreach($pembelian->pembelian_details as $item)
                        <li>({{ toIdr($item->total) }}) {{ $item->barang->nama }}: {{ $item->jumlah }}
                            @ {{ toIdr($item->harga) }}</li>
                    @endforeach
                </td>

                <td>{{ $pembelian->status }}</td>

                <td>{{ $pembelian->catatan }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection