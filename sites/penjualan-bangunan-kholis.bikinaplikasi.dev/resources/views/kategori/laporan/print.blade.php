@extends('layouts.print')
@section('content')
    <h3 align="center">LAPORAN KATEGORI</h3>
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
        @foreach($kategoris as $kategori)
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>
                    ({{ toIdr($kategori->kategori_details->sum('total')) }}) <strong>{{ $kategori->pemasok->nama }}</strong>

                    @foreach($kategori->kategori_details as $item)
                        <li>({{ toIdr($item->total) }}) {{ $item->produk->nama }}: {{ $item->jumlah }}
                            @ {{ toIdr($item->harga) }}</li>
                    @endforeach
                </td>

                <td>{{ $kategori->status }}</td>

                <td>{{ $kategori->catatan }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection