@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <h3 class="mb-0">
                        {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}
                    </h3>
                    <div class="mb-3"></div>
                    <table class="table" id='dataTable'>
                        <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lapangan as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->nama }}</td>

                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url('/lapangan/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/lapangan' . '/' . $item->id) }}" method='post'
                                            style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href=""
                                                for='btnSubmit-{{ $item->id }}' style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                style="display: none;"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "{{ url('lapangan/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('lapangan/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('lapangan/create') }}";

                        var columnOrders = [{{ 0 }}];
                        var urlSearch = "{{ url('lapangan') }}";
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
