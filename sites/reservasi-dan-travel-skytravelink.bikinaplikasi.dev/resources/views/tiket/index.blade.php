@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <h3 class="mb-0">{{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>
                    <div class="mb-3"></div>
                    <table class="table" id='dataTable'>
                        <thead>
                        <tr>
                            <th width=2>#</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                            <th>Mobil</th>
                            <th>Rute</th>
                            <th>Jadwal</th>
                            <th>Supir</th>
                            <th>Dimulai Pada</th>
                            <th>Berakhir Pada</th>
                            <th>Pulang Pergi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tiket as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->mobil->nama }}</td>
                                <td>{{ $item->rute->dari()->nama }} - {{ $item->rute->ke()->nama }}</td>
                                <td>{{ $item->jadwal->hari }}, {{ $item->jadwal->jam_mulai }} - {{ $item->jadwal->jam_akhir }}</td>
                                <td>{{ $item->supir->nama }}</td>
                                <td>{{ $item->dimulai_pada }}</td>
                                <td>{{ $item->berakhir_pada }}</td>
                                <td>{{ $item->pulang_pergi }}</td>

                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="{{ url('/tiket/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/tiket' . '/' . $item->id) }}"
                                          method='post' style='display: inline;'
                                          onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                        @method('DELETE')
                                        @csrf
                                        <label class="badge badge-danger" href=""
                                               for='btnSubmit-{{ $item->id }}'
                                               style='cursor: pointer;'>Hapus</label>
                                        <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                style="display: none;"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "{{ url('tiket/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('tiket/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('tiket/create') }}";

                        var columnOrders = [{{ $tiket_count - 3 }}];
                        var urlSearch = "{{ url('tiket') }}";
                        var q = "{{ $_GET['q'] ?? '' }}";
                        var placeholder = "Filter...";

                        var tampilkan_buttons = true;
                        var button_manual = true;
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
