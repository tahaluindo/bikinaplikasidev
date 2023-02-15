@extends("layouts.admin-lte.app")

@section('page') Absensi @endsection

@section("content")
    <div class="row">

        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table" id='dataTable'>
                    <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Mapel & Kelas</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($absensis as $absensi)
                        <tr data-id='{{ $absensi->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $absensi->mapel_detail->mapel->nama }}
                                | {{ $absensi->mapel_detail->kelas->nama }}</td>
                            <td>{{ $absensi->tanggal }}</td>
                            <td class="text-center">
                                <a href="{{ url(route('absensi.laporan.print', [$absensi->id])) }}" class="label label-info">Lihat Laporan</a>

                                <a class="label label-info"
                                   href="{{ url(route('absensi.show', ['absensi' => $absensi->id])) }}">Detail</a>
                                <a class="label label-primary"
                                   href="{{ url(route('absensi.edit', ['absensi' => $absensi->id])) }}">Edit</a>
                                <form
                                    action="{{ url(route('absensi.destroy', ['absensi' => $absensi->id])) }}"
                                    method='post' style='display: inline;'
                                    onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                    @method('DELETE')
                                    @csrf
                                    <label class="label label-danger" href=""
                                           for='btnSubmit-{{ $absensi->id }}'
                                           style='cursor: pointer;'>Hapus</label>
                                    <button type="submit" id='btnSubmit-{{ $absensi->id }}'
                                            style="display: none;"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var locationHrefHapusSemua = "{{ url('absensi/hapus_semua') }}";
        var locationHrefCreate = "{{ url('absensi/create') }}";
        var columnOrders = [0, 1];
        var urlSearch = "{{ url('balasan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "cari absensi...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
