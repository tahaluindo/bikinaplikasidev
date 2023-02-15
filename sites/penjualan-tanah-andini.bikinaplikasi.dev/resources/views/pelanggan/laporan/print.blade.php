    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN P</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th>
<th>Nama</th>
<th>No Hp</th>

        </tr>
    </thead>
    <tbody>
        @foreach($pelanggans as $pelanggan)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $pelanggan->id }}</td>

<td>{{ $pelanggan->nama }}</td>

<td>{{ $pelanggan->no_hp }}</td>


        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection