@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-sm-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Jadwal</li>
            </ol>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                <span>
                    <a id='dropdownHari' class="btn pull-right hidden-sm-down bg-light dropdown-toggle"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Hari</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownHari">
                        <a class="dropdown-item" href="{{ url('jadwal?hari=semua_hari') }}">Semua Hari</a>
                        @foreach($haris as $hari)
                        <a class="dropdown-item" href='{{ url("jadwal?hari={$hari}") }}'>{{ $hari }}</a>
                        @endforeach
                    </div>
                </span>
            </div>
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
                                    <th></th>
                                    <th>Mapel</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Dari Jam</th>
                                    <th>Sampai Jam</th>
                                    <th>Status</th>

                                    @if(in_array(auth()->user()->level, ['admin']))
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwals as $jadwal)
                                <tr data-id='{{ $jadwal->id }}'>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jadwal->mapel_detail->mapel->nama }}</td>
                                    <td>{{ $jadwal->mapel_detail->user->nama }}</td>
                                    <td>{{ $jadwal->hari }}</td>
                                    <td>{{ $jadwal->dari_jam }}</td>
                                    <td>{{ $jadwal->sampai_jam }}</td>
                                    <td>{{ $jadwal->status }}</td>
                                    
                                    @if(in_array(auth()->user()->level, ['admin']))
                                    <td class="text-center">
                                        <a class="label label-primary" href="{{ url(route('jadwal.edit', ['jadwal' => $jadwal->id])) }}">Edit</a>
                                        <form action="{{ url(route('jadwal.destroy', ['jadwal' => $jadwal->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $jadwal->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $jadwal->id }}'
                                                style="display: none;"></button>
                                        </form>
                                    </td>
                                    @endif
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
    const locationHrefHapusSemua = "{{ url('jadwal/hapus_semua') }}";
    const locationHrefCreate = "{{ url('jadwal/create') }}";
    var columnOrders = [6];
    var urlSearch = "{{ url('jadwal') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";

    @if(in_array(auth()->user()->level, ['guru', 'siswa', 'kepala sekolah']))
    var tampilkan_buttons = false;
    var button_manual = false;
    @else
    var tampilkan_buttons = true;
    var button_manual = true;
    @endif

</script>
@endsection