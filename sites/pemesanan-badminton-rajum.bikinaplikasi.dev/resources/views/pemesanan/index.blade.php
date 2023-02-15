@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row justify-content-center table-responsive">

                <div class="col-lg-12">
                    <h3 class="mb-0">
                        {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}
                    </h3>
                    <div class="mb-3"></div>
                    <table class="table" id='dataTable'>
                        <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Atas Nama</th>
                                <th>No Hp</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Akhir</th>
                                <th>Bukti Transfer</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Metode Pembayaran</th>
                                <th>Lapangan</th>

                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->atas_nama }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->waktu_mulai }}</td>
                                    <td>{{ $item->jumlah_jam }}</td>
                                    <td>
                                        @if ($item->bukti_transfer && $item->metode_pembayaran == "Transfer")
                                            <img src='{{ url($item->bukti_transfer) }}' width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td>{{ $item->lapangan->nama }}</td>

                                    <td class="text-center">
                                        <a class="badge badge-primary"
                                            href="{{ url('/pemesanan/' . $item->id . '/terima') }}"
                                            onclick="return confirm('Yakin akan menerima pesanan ini?')">Terima</a>
                                        <a class="badge badge-primary"
                                            href="{{ url('/pemesanan/' . $item->id . '/batal') }}"
                                            onclick="return confirm('Yakin akan membatalkan pesanan ini?')">Batalkan</a>
                                        <a class="badge badge-primary"
                                            href="{{ url('/pemesanan/' . $item->id . '/pending') }}"
                                            onclick="return confirm('Yakin akan pending pesanan ini?')">Pending</a>

                                        <a class="label label-primary"
                                            href="{{ url('/pemesanan/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/pemesanan' . '/' . $item->id) }}" method='post'
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
                        const locationHrefHapusSemua = "{{ url('pemesanan/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('pemesanan/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('pemesanan/create') }}";

                        var columnOrders = [{{ 0 }}];
                        var urlSearch = "{{ url('pemesanan') }}";
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
