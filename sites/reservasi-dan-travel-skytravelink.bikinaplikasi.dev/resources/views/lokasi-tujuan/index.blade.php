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
                            <th>Rute</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>

                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lokasi_tujuan as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $item->rute->dari()->nama }} - {{ $item->rute->ke()->nama }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <a href="{{ url($item->gambar ?? "") }}">
                                        <img src="{{ url($item->gambar ?? "") }}" width="100">
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="{{ url('/lokasi-tujuan/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/lokasi-tujuan' . '/' . $item->id) }}"
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
                        const locationHrefHapusSemua = "{{ url('lokasi-tujuan/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('lokasi-tujuan/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('lokasi-tujuan/create') }}";

                        var columnOrders = [{{ $lokasi_tujuan_count - 2 }}];
                        var urlSearch = "{{ url('lokasi_tujuan') }}";
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
