    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN ANAK ASUH</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th><th>Jk</th><th>Ttl</th><th>Pendidikan</th><th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anak_asuhs as $anak_asuh)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $anak_asuh->nama }}</td>
<td>{{ $anak_asuh->jk }}</td>
<td>{{ $anak_asuh->ttl }}</td>
<td>{{ $anak_asuh->pendidikan }}</td>
<td>{{ $anak_asuh->status }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection