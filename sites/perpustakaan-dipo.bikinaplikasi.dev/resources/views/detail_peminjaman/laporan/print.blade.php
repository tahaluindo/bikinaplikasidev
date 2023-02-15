    @extends('layouts.print')

    @section('content')

        <h3 align="center">LAPORAN {{ preg_replace("/_/", " ", "DETAIL_PEMINJAMAN") }}</h3>

        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Peminjaman Id</th>
<th>Buku Id</th>
<th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($detail_peminjamans as $detail_peminjaman)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $detail_peminjaman->peminjaman->anggota->nama }}</td>

<td>{{ $detail_peminjaman->buku->judul }}</td>


<td>{{ $detail_peminjaman->status }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection