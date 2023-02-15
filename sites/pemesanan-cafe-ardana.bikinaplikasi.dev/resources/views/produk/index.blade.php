@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Produk</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Produk
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
                            <th class="border">Kategori Id</th>
                            <th class="border">Nama</th>
                            <th class="border">Expire At</th>
                            <th class="border">Harga Jual</th>
                            <th class="border">Stok</th>
                            <th class="border">Gambar</th>
                            <th class="border text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produk as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border">{{ $item->kategori->nama }}</td>
                                <td class="border">{{ $item->nama }}</td>
                                <td class="border">{{ $item->expire_at }}</td>
                                <td class="border">{{ toIdr($item->harga_jual) }}</td>
                                <td class="border">{{ $item->stok }}</td>
                                <td class="border">
                                    <a href="{{ url($item->gambar) }}">
                                        <img src="{{ url($item->gambar) }}" alt="" srcset="" width="50" height="50">
                                    </a>
                                </td>

                                <td class="border text-center">
                                    <a class="label label-primary"
                                       href="{{ url('/produk/' . $item->id . '/edit') }}">Edit</a>
                                    <form action="{{ url('/produk' . '/' . $item->id) }}"
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
                        const locationHrefHapusSemua = "{{ url('produk/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('produk/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('produk/create') }}";
                        var columnOrders = [{{ $produk_count - 3 }}];
                        var urlSearch = "{{ url('produk') }}";
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
