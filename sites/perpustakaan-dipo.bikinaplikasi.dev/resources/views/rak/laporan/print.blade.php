    @extends('layouts.print')

    @section('content')

        <h3 align="center">LAPORAN RAK</h3>

        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th>
        </tr>
    </thead>

    <tbody>
        @foreach($raks as $rak)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $rak->nama }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection