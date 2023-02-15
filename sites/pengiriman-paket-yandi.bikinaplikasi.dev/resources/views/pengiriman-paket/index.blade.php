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
                            <th>User Id</th>
                            <th>Paket Id</th>
                            <th>Rute Id</th>
                            <th>Jadwal Id</th>
                            <th>Jumlah (KG)</th>
                            <th>Total Bayar</th>
                            <th>Refund</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengiriman_paket as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $item->user->name ?? "" }}</td>
                                <td>{{ $item->paket->nama }}</td>
                                <td>{{ $item->rute->dari()->nama }} - {{ $item->rute->ke()->nama }}</td>
                                <td>{{ $item->jadwal->hari }} - {{ $item->jadwal->jam_mulai }}  - {{ $item->jadwal->jam_akhir }} </td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ toIdr($item->total_bayar) }}</td>
                                <td>{{ toIdr($item->refund) }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="{{ url('/pengiriman-paket/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/pengiriman-paket' . '/' . $item->id) }}"
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
                        const locationHrefHapusSemua = "{{ url('pengiriman-paket/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('pengiriman-paket/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('pengiriman-paket/create') }}";

                        var columnOrders = [{{ $pengiriman_paket_count - 5 }}];
                        var urlSearch = "{{ url('pengiriman-paket') }}";
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
