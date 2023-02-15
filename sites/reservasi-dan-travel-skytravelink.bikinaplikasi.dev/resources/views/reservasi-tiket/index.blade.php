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
                            <th>User</th>
                            <th>Tiket</th>
                            <th>Jumlah</th>
                            <th>B. Pada</th>
                            <th>B. Transfer</th>
                            <th>Pulang Pergi</th>
                            <th>Total Bayar</th>
                            <th>Refund</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservasi_tiket as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $item->user->name ?? "" }}</td>
                                <td>{{ $item->tiket->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->berakhir_pada }}</td>
                                <td>
                                    <a href="{{ url($item->bukti_transfer) }}">
                                        <img src="{{ url($item->bukti_transfer ?? "image/no_image.png") }}" width="100">
                                    </a>
                                </td>
                                <td>{{ $item->pulang_pergi }}</td>
                                <td>{{ toIdr($item->total_bayar) }}</td>
                                <td>{{ toIdr($item->refund) }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="{{ url('/reservasi-tiket/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/reservasi-tiket' . '/' . $item->id) }}"
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
                        const locationHrefHapusSemua = "{{ url('reservasi-tiket/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('reservasi-tiket/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('reservasi-tiket/create') }}";

                        var columnOrders = [{{ $reservasi_tiket_count - 2 }}];
                        var urlSearch = "{{ url('reservasi-tiket') }}";
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
