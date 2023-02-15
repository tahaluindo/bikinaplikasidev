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
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Akhir</th>

                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jadwal as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_akhir }}</td>

                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="{{ url('/jadwal/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/jadwal' . '/' . $item->id) }}"
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
                        const locationHrefHapusSemua = "{{ url('jadwal/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('jadwal/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('jadwal/create') }}";

                        var columnOrders = [{{ $jadwal_count - 2 }}];
                        var urlSearch = "{{ url('jadwal') }}";
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
