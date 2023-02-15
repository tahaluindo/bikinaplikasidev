@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Penjualan Detail</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Penjualan Detail
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
                            <th class="border">Produk Id</th>
                            <th class="border">Harga</th>
                            <th class="border">Jumlah</th>
                            <th class="border">Total</th>
                            <th class="border" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($penjualan_detail as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td class="border">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border">{{ $item->produk->nama }}</td>
                                <td class="border">{{ toIdr($item->harga) }}</td>
                                <td class="border">{{ $item->jumlah }}</td>
                                <td class="border">{{ toIdr($item->total) }}</td>

                                <td class="border text-center">
                                    <a class="label label-primary"
                                       href="{{ url('/penjualan-detail/' . $item->id . '/edit') }}">Edit</a>
                                    <form
                                        action="{{ url('/penjualan-detail' . '/' . $item->id . "?penjualan_id=" . request()->penjualan_id) }}"
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


                        <tr>
                            <td class="border">
                                <strong>Total</strong>
                            </td>

                            <td class="border"></td>
                            <td class="border"></td>
                            <td class="border">{{ $penjualan_detail->sum('jumlah') }}</td>
                            <td class="border">{{ toIdr($penjualan_detail->sum('total')) }}</td>

                            <td class="border text-right">

                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "{{ url('penjualan-detail/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('penjualan-detail/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('penjualan-detail/create') . "?penjualan_id=" . request()->penjualan_id }}";
                        var columnOrders = [{{ $penjualan_detail_count  - 1}}];
                        var urlSearch = "{{ url('penjualan-detail') }}";
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
