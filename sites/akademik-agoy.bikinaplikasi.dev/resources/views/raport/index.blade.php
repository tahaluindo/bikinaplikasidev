@extends("layouts.admin-lte.app")

@section('page') Raport @endsection

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table" id='dataTable'>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($raports as $raport)
                        <tr data-id='{{ $raport->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $raport->user->nama }}</td>
                            <td>{{ $raport->tahun }}</td>
                            <td>{{ $raport->semester }}</td>
                            <td>{{ $raport->status }}</td>

                            <td class="text-center">
                                @if($raport->status == "Belum Diberikan")
                                    @if(!$raport->hasil_nilai)

                                        <a class="label label-primary"
                                           href="{{ route('raport.input', $raport->id) }}?status=Sudah Diberikan">Input</a>
                                    @else
                                        <a class="label label-primary"
                                           href="{{ route('raport.input', $raport->id) }}?status=Sudah Diberikan">Input</a>
                                    @endif

                                    <a class="label label-info"
                                       href="{{ route('raport.updateStatus', $raport->id) }}?status=Sudah Diberikan"
                                       onclick="return confirm('Yakin akan memberikan raport?')">Berikan</a>
                                @else
                                    <a class="label label-primary"
                                           href="{{ route('raport.input', $raport->id) }}?status=Sudah Diberikan">Input</a>

                                    <a class="label label-danger text-white">Sudah Diberikan</a>
                                @endif

                                <a class="label label-success" href="{{ route('raport.print', $raport->id) }}">Print</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('nilai/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('nilai/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('nilai/create') }}";
        var columnOrders = [0];
        var urlSearch = "{{ url('nilai') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = true;
    </script>
@endsection
