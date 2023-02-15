    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN PESANAN</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Penjual</th>
<th>Meja</th>
<th>Atas Nama</th>
<th>Status</th>

        </tr>
    </thead>
    <tbody>
        @foreach($pesanans as $pesanan)
        <tr>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $pesanan->penjual->user->name }}</td>
            <td>{{ $pesanan->meja->no }}</td>
            <td>{{ $pesanan->atas_nama }}</td>
            <td>{{ $pesanan->status }}</td>


        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection