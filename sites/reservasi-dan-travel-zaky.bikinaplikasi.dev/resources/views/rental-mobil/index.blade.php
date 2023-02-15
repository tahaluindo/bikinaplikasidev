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
                            <th>Mobil</th>
                            <th>Supir</th>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>B. Supir</th>
                            <th>Total Bayar</th>
                            <th>B. Transfer</th>
                            <th>Refund</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rental_mobil as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $item->user->name ?? "" }}</td>
                                <td>{{ $item->mobil->nama }}</td>
                                <td>{{ $item->supir->name ?? "" }}</td>
                                <td>{{ $item->dari_tanggal }}</td>
                                <td>{{ $item->sampai_tanggal }}</td>
                                <td>{{ toIdr($item->biaya_supir) }}</td>
                                <td>{{ toIdr($item->total_bayar) }}</td>
                                <td>
                                    <a href="{{ url($item->bukti_transfer) }}">
                                        <img src="{{ url($item->bukti_transfer) }}" width="100">
                                    </a>
                                </td>
                                <td>{{ toIdr($item->refund) }}</td>
                                <td>{{ $item->status }}</td>

                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="{{ url('/rental-mobil/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/rental-mobil' . '/' . $item->id) }}"
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
                        const locationHrefHapusSemua = "{{ url('rental-mobil/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('rental-mobil/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('rental-mobil/create') }}";

                        var columnOrders = [{{ $rental_mobil_count - 4 }}];
                        var urlSearch = "{{ url('rental-mobil') }}";
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
