@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Antrian</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Antrian</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex">

                @foreach($poli as $item)
                    <a href="?poli_id={{ $item->id }}"
                       class="btn {{ request()->poli_id == $item->id ? "btn-primary" : "btn-outline-primary" }} mr-1">{{ $item->nama_poli }}</a>
                @endforeach
            </div>
        </div>
    </div>

    @if(request('poli_id'))
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">

                                <h1 class="text-center"
                                    style="font-size: 100px;">{{ $antrian->where('status', 'Sekarang')->where('poli_id', request('poli_id'))->first()->nomor }} </h1>


                                @if($antrian->where('status', 'Sekarang')->first()->pasien_id != null)

                                    <strong class="text-success">Registrasi Online</strong><br>

                                    @php
                                        $pasienCreate = \App\Models\Pasien::findOrFail($antrian->where('status', 'Sekarang')->where('poli_id', request('poli_id'))->first()->pasien_id);
                                    @endphp

                                    ID BPJS: {{ $pasienCreate->id_bpjs }} <br>
                                    Nama: {{ $pasienCreate->nama }} <br>
                                    Umur: {{ $pasienCreate->umur }} <br>
                                    Alamat: {{ $pasienCreate->alamat }} <br>
                                    Jenis Kelamin: {{ $pasienCreate->jenis_kelamin }}<br>
                                    Keluhan penyakit: {{ $pasienCreate->keluhan_penyakit }} <p><p>
                                    NO Ktp: {{ $pasienCreate->no_ktp }} <br>
                                    Status BPJS: {{ $pasienCreate->bpjs }} <p><p>
                                        
                                        @endif


                                        <a class="btn btn-sm btn-outline-warning"
                                           onclick="if(confirm('Yakin akan mereset nomor?')) { location.href = '{{ route('antrian.reset') }}?poli_id={{ request('poli_id') }}' }">Reset</a>
                                        <a class="btn btn-sm btn-outline-primary"
                                           href="{{ route('antrian.sebelumnya') }}?poli_id={{ request('poli_id') }}">Sebelumnya</a>
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('antrian.skip') }}?poli_id={{ request('poli_id') }}">Skip</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('antrian.selanjutnya') }}?poli_id={{ request('poli_id') }}">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                @if(session()->has("error"))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get("error") }}
                                    </div>
                                @elseif(session()->has("success"))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get("success") }}
                                    </div>
                                @elseif(session()->has("warning"))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session()->get("warning") }}
                                    </div>
                                @endif

                                <div class="activity-table table-responsive recent-table">
                                    <table class="table" id=''>
                                        <thead>
                                        <tr>
                                            <th>Belum</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($antrian->where('status', 'Belum')->where('poli_id', request('poli_id')) as $key => $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>{{ $item->nomor }} @if($item->pasien_id) <strong
                                                        class="text-secondary">Registrasi Online</strong> @endif</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    const locationHrefHapusSemua = "{{ url('antrian/hapus_semua') }}";
                                    const locationHrefAktifkanSemua = "{{ url('antrian/aktifkan_semua') }}";
                                    const locationHrefCreate = "{{ url('antrian/create') }}";
                                    var columnOrders = [{{ 0 }}];
                                    var urlSearch = "{{ url('antrian') }}";
                                    var q = "{{ $_GET['q'] ?? '' }}";
                                    var placeholder = "Filter...";
                                    var tampilkan_buttons = false;
                                    var button_manual = false;
                                </script>
                            </div>

                            <div class="col-sm-4">
                                @if(session()->has("error"))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get("error") }}
                                    </div>
                                @elseif(session()->has("success"))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get("success") }}
                                    </div>
                                @elseif(session()->has("warning"))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session()->get("warning") }}
                                    </div>
                                @endif

                                <div class="activity-table table-responsive recent-table">
                                    <table class="table" id=''>
                                        <thead>
                                        <tr>
                                            <th>Sudah</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($antrian->where('status', 'Sudah')->where('poli_id', request('poli_id')) as $key => $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>{{ $item->nomor }} @if($item->pasien_id) <strong
                                                        class="text-secondary">Registrasi Online</strong> @endif</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    const locationHrefHapusSemua = "{{ url('antrian/hapus_semua') }}";
                                    const locationHrefAktifkanSemua = "{{ url('antrian/aktifkan_semua') }}";
                                    const locationHrefCreate = "{{ url('antrian/create') }}";
                                    var columnOrders = [{{ 0 }}];
                                    var urlSearch = "{{ url('antrian') }}";
                                    var q = "{{ $_GET['q'] ?? '' }}";
                                    var placeholder = "Filter...";
                                    var tampilkan_buttons = false;
                                    var button_manual = false;
                                </script>
                            </div>

                            <div class="col-sm-4">
                                @if(session()->has("error"))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get("error") }}
                                    </div>
                                @elseif(session()->has("success"))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get("success") }}
                                    </div>
                                @elseif(session()->has("warning"))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session()->get("warning") }}
                                    </div>
                                @endif

                                <div class="activity-table table-responsive recent-table">
                                    <table class="table" id=''>
                                        <thead>
                                        <tr>
                                            <th>Di Skip</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($antrian->where('status', 'Di Skip')->where('poli_id', request('poli_id')) as $key => $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>{{ $item->nomor }} @if($item->pasien_id) <strong
                                                        class="text-secondary">Registrasi Online</strong> @endif</td>
                                                <td>
                                                    <a class="label label-primary"
                                                       onclick="return confirm('Sudahi nomor ini?')"
                                                       href="{{ route('antrian.sudah') }}?id={{ $item->id }}">Sudah</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    const locationHrefHapusSemua = "{{ url('antrian/hapus_semua') }}";
                                    const locationHrefAktifkanSemua = "{{ url('antrian/aktifkan_semua') }}";
                                    const locationHrefCreate = "{{ url('antrian/create') }}";
                                    var columnOrders = [{{ 0 }}];
                                    var urlSearch = "{{ url('antrian') }}";
                                    var q = "{{ $_GET['q'] ?? '' }}";
                                    var placeholder = "Filter...";
                                    var tampilkan_buttons = false;
                                    var button_manual = false;
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
