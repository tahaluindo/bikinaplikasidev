    @extends('layouts.print')
    @section('content')
        <h3 align="center">LAPORAN TAHUN</h3>
        <table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tahuns as $tahun)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $tahun->tahun }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
    @endsection