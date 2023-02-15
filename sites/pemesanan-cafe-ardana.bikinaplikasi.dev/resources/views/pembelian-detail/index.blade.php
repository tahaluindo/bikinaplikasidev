@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Pembelian Detail</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pembelian
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
                            <th width=2 class="border">#</th>
                            <th class="border">Produk Id</th>
                            <th class="border">Harga</th>
                            <th class="border">Jumlah</th>
                            <th class="border">Total</th>
                            <th class="border text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pembelian_detail as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td class="border">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border">{{ $item->produk->nama }}</td>
                                <td class="border">{{ toIdr($item->harga) }}</td>
                                <td class="border">{{ $item->jumlah }}</td>
                                <td class="border">{{ toIdr($item->total) }}</td>

                                <td class="text-center border">
                                    <a class="label label-primary"
                                       href="{{ url('/pembelian-detail/' . $item->id . '/edit') }}">Edit</a>
                                    <form
                                        action="{{ url('/pembelian-detail' . '/' . $item->id . "?pembelian_id=" . request()->pembelian_id) }}"
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
                            <td class="border">{{ $pembelian_detail->sum('jumlah') }}</td>
                            <td class="border">{{ toIdr($pembelian_detail->sum('total')) }}</td>

                            <td class="text-right border">

                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "{{ url('pembelian-detail/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('pembelian-detail/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('pembelian-detail/create') . "?pembelian_id=" . request()->pembelian_id }}";
                        var columnOrders = [{{ $pembelian_detail_count - 3 }}];
                        var urlSearch = "{{ url('pembelian-detail') . "?pembelian_id=" . request()->pembelian_id  }}";
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
