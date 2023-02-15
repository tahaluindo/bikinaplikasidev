@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Pemesanan</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pemesanan
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
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

                    <table class="table" id='dataTable'>
                        <thead>
                        <tr>
                            <th width=3>No.</th>
                            <th>Kode</th>
                            <th>No Meja</th>
                            <th>No Hp</th>
                            <th>Nama Pelanggan</th>
                            <th>Produk</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Created At</th>
                            <th class="border text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pemesanan as $item)
                            <tr data-id='{{ $item->id }}'>
                                <th>{{ $loop->iteration }}.</th>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->meja->no_meja }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->nama_pelanggan }}</td>

                                <td>
                                    ({{ toIdr($item->pemesanan_details->sum('total')) }})
                                    <strong>Pelanggan: {{ $item->nama_pelanggan }}</strong>

                                    @foreach($item->pemesanan_details as $itemPemesananDetails)
                                        <li>({{ toIdr($itemPemesananDetails->total) }}
                                            ) {{ $itemPemesananDetails->produk->nama ?? "-" }}
                                            : {{ $itemPemesananDetails->jumlah }}
                                            @ {{ toIdr($itemPemesananDetails->harga) }}</li>
                                    @endforeach
                                </td>

                                <td>{{ $item->status }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>{{ $item->created_at }}</td>

                                <td class="border text-center">
                                    @if($item->status != 'selesai' && $item->pemesanan_details)
                                        <a class="label label-primary"
                                           href="{{ url('/pemesanan/' . $item->id . '/selesaikan') }}">Selesaikan</a>
                                    @endif


                                    <a class="label label-default"
                                       onclick="window.open('{{ url('/pemesanan/nota/' . $item->id) }}', '_blank');">Print</a>
                                    <a class="label label-info"
                                       href="{{ url('/pemesanan-detail?pemesanan_id=' . $item->id) }}">Detail</a>


                                    <a class="label label-primary"
                                       href="{{ url('/pemesanan/' . $item->id . '/edit') }}">Edit</a>

                                    @if(auth()->user()->level == 'Pemilik')
                                        <form action="{{ url('/pemesanan' . '/' . $item->id) }}"
                                              method='post' style='display: inline;'
                                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                                                   style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                    style="display: none;"></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "{{ url('pemesanan/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('pemesanan/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('pemesanan/create') }}";
                        var columnOrders = [{{ $pemesanan_count - 2 }}];
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
