@extends("layouts.monster-admin-lite.app")

@section("content")
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Absensi</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
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
                                            @if(auth()->user()->level == 'siswa')
                                                @if(!($absensi->absensi_details->where('user_id', auth()->user()->id)->where('status', '=', 'Hadir')->first() || $absensi->absensi_details->where('user_id', auth()->user()->id)->where('status', '=', 'Izin')->first()))
                                                    <a class="label label-info"
                                                       href="{{ url("absensi/$absensi->id/hadir-mandiri") }}"
                                                       onclick="return confirm('Yakin akan absen hadir?');">Hadir</a>
                                                @else
                                                    <a class="label label-warning">Sudah Absen</a>
                                                @endif
                                            @else
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
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

        @if(auth()->user()->level == 'siswa')
        var tampilkan_buttons = false;
        var button_manual = false;
        @else
        var tampilkan_buttons = true;
        var button_manual = true;
        @endif
    </script>
@endsection
