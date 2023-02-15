@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-sm-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Nilai</li>
            </ol>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                <span>
                    <a id='dropdownGuru' class="btn pull-right hidden-sm-down bg-light dropdown-toggle"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Guru</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownGuru">
                        <a class="dropdown-item" href="{{ url('nilai?user_id=semua_guru') }}">Semua Guru</a>
                        @foreach($users as $user)
                        <a class="dropdown-item"
                            href='{{ url("nilai?user_id={$user->id}") }}'>{{ $user->user->nama }}</a>
                        @endforeach
                    </div>
                </span>

                <span>
                    <a id='dropdownMapel' class="btn pull-right hidden-sm-down bg-light dropdown-toggle"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Mapel</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMapel">
                        <a class="dropdown-item" href="{{ url('nilai?mapel_id=semua_mapel') }}">Semua Mapel</a>
                        @foreach($mapels as $mapel)
                        <a class="dropdown-item"
                            href='{{ url("nilai?mapel_id={$mapel->mapel->id}") }}'>{{ $mapel->mapel->nama }}</a>
                        @endforeach
                    </div>
                </span>

                <span>
                    <a id='dropdownKelas' class="btn pull-right hidden-sm-down bg-light dropdown-toggle"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Kelas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownKelas">
                        <a class="dropdown-item" href="{{ url('nilai?kelas_id=semua_kelas') }}">Semua Kelas</a>
                        @foreach($kelass as $kelas)
                        <a class="dropdown-item"
                            href='{{ url("nilai?kelas_id={$kelas->kelas->id}") }}'>{{ $kelas->kelas->nama }}</a>
                        @endforeach
                    </div>
                </span>

                <span>
                    <a id='dropdownTahun' class="btn pull-right hidden-sm-down bg-light dropdown-toggle"
                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Tahun</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownTahun">
                        <a class="dropdown-item" href="{{ url('nilai?tahun=semua_tahun') }}">Semua Tahun</a>
                        @foreach($tahuns as $tahun)
                        <a class="dropdown-item"
                            href='{{ url("nilai?tahun=$tahun") }}'>{{ $tahun }}</a>
                        @endforeach
                    </div>
                </span>

                {{-- <a href="{{ url('user/import') }}" class="btn pull-right hidden-sm-down bg-light">
                    Import</a>
                <a href="{{ url('user/download_format') }}" class="btn pull-right hidden-sm-down bg-light">
                    Download Format</a>
                <a href="{{ url('user/export') }}" class="btn pull-right hidden-sm-down bg-light">
                    Export</a> --}}
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
                                    <th>Guru</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
                                    <th>
                                        Tahun <br> 
                                        Pelajaran
                                    </th>
                                    <th>
                                        Semester
                                    </th>


                                    @if(in_array(auth()->user()->level, ['guru']))
                                    <th class="text-center">Aksi</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilais as $nilai)
                                <tr data-id='{{ $nilai->id }}'>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nilai->mapel_detail->user->nama }}</td>
                                    <td>{{ $nilai->mapel_detail->mapel->nama }}</td>
                                    <td>{{ $nilai->mapel_detail->kelas->nama }}</td>
                                    <td>{{ $nilai->tahun }}</td>
                                    <td>{{ $nilai->semester }}</td>
                                    
                                    <td class="text-center">
                                        @if(in_array(auth()->user()->level, ['guru']))
                                        <a class="label label-info" href="{{ url(route('nilai_detail.index')) }}?nilai_id={{ $nilai->id }}">Detail</a>

                                        <a class="label label-primary" href="{{ url(route('nilai.edit', ['nilai' => $nilai->id])) }}">Edit</a>
                                        <form action="{{ url(route('nilai.destroy', ['nilai' => $nilai->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $nilai->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $nilai->id }}'
                                                style="display: none;"></button>
                                        </form>
                                        @else
                                        <a class="label label-info" href="{{ url(route('nilai_detail.index')) }}?nilai_id={{ $nilai->id }}">Detail</a>
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
    const locationHrefHapusSemua = "{{ url('nilai/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('nilai/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('nilai/create') }}";
    var columnOrders = [5];
    var urlSearch = "{{ url('nilai') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    
    @if(in_array(auth()->user()->level, ['guru']))
    var tampilkan_buttons = true;
    @else
    var tampilkan_buttons = false;
    @endif

    var button_manual = true;
</script>
@endsection