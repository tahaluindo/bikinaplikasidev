    @extends('layouts.print')

    @section('content')

        <h3 align="center">LAPORAN KELAS</h3>

        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama</th>
        </tr>
    </thead>

    <tbody>
        @foreach($kelass as $kelas)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $kelas->nama }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection