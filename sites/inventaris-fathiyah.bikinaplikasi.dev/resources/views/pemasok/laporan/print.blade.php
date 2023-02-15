    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN PEMASOK</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Id</th><th>Nama</th><th>No Hp</th><th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemasoks as $pemasok)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $pemasok->id }}</td>
<td>{{ $pemasok->nama }}</td>
<td>{{ $pemasok->no_hp }}</td>
<td>{{ $pemasok->alamat }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection