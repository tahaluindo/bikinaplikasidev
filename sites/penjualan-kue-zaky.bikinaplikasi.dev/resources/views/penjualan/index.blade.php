@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Penjualan</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Penjualan
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
                            <th class="border" width=2>#</th>
                            <th class="border">Kode</th>
                            <th class="border">Nama Pelanggan</th>
                            <th class="border">Status</th>
                            <th class="border">Catatan</th>
                            <th class="border">No HP</th>
                            <th class="border">Alamat Pengiriman</th>
                            <th class="border">Bukti Transfer</th>
                            <th class="border">Ongkos Kirim</th>
                            <th class="border">Total</th>
                            <th class="border text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($penjualan as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td class="border">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border">{{ $item->id }}</td>
                                <td class="border">{{ $item->nama_pelanggan }}</td>
                                <td class="border">{{ $item->status }}</td>
                                <td class="border">{{ $item->catatan }}</td>
                                <td class="border">{{ $item->no_hp }}</td>
                                <td class="border">{{ $item->alamat_pengiriman }}</td>
                                
                                <td class="border">
                                    <img src="{{ url($item->bukti_transfer ?? "") }}" width="50" height="50">
                                </td>
                                
                                <td class="border">{{ toIdr($item->ongkos_kirim ?? 0) }}</td>
                                
                                <td class="border">{{ toIdr($item->penjualan_details->sum('total') + $item->ongkos_kirim) }}</td>

                                <td class="border text-center">
                                    <a class="label label-default"
                                       onclick="window.open('{{ url('/penjualan/nota/' . $item->id) }}', '_blank');">Print</a>
                                    <a class="label label-info"
                                       href="{{ url('/penjualan-detail?penjualan_id=' . $item->id) }}">Detail</a>
                                    <a class="label label-primary"
                                       href="{{ url('/penjualan/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/penjualan' . '/' . $item->id) }}"
                                          method='post' style='display: inline;'
                                          onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                        @method('DELETE')
                                        @csrf
                                        <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
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
                        const locationHrefHapusSemua = "{{ url('penjualan/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('penjualan/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('penjualan/create') }}";
                        var columnOrders = [{{ $penjualan_count - 2 }}];
                        var urlSearch = "{{ url('penjualan') }}";
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
