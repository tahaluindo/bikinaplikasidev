    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN ULASAN</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Created At</th>
<th>Updated At</th>
<th>User Id</th>
<th>Kos Id</th>
<th>Komentar</th>
<th>Disukai</th>

        </tr>
    </thead>
    <tbody>
        @foreach($disukai as $disukai)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $disukai->created_at }}</td>

<td>{{ $disukai->updated_at }}</td>

<td>{{ $disukai->user_id }}</td>

<td>{{ $disukai->kos_id }}</td>

<td>{{ $disukai->komentar }}</td>

<td>{{ $disukai->disukai }}</td>


        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection