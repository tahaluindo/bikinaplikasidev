    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN TENTANG</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Created At</th><th>Updated At</th><th>User Id</th><th>Kos Id</th><th>Komentar</th><th>Disukai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tentangs as $tentang)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $tentang->created_at }}</td>
<td>{{ $tentang->updated_at }}</td>
<td>{{ $tentang->user_id }}</td>
<td>{{ $tentang->kos_id }}</td>
<td>{{ $tentang->komentar }}</td>
<td>{{ $tentang->disukai }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection