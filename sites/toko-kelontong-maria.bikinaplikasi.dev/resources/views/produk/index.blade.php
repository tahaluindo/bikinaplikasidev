@extends('layouts.app')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header" style="margin-bottom: 0px;">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('') }}"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Produk</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-12 col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>Produk</h5>
                                        </div>
                                        <div class="card-body px-3 py-3">
                                            <div class="table-stats order-table ov-h table-responsive"
                                                 style="padding-left: 28px; padding-top: 20px;">

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

                                                <div class="table-stats order-table ov-h table-responsive">

                                                    <table class="table" id='dataTable'>
                                                        <thead>
                                                        <tr>
                                                            <th width=2>#</th>
                                                            <th>Nama</th>
                                                            <th>Stok</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($produk as $item)
                                                            <tr data-id='{{ $item->id }}'>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>

                                                                <td>{{ $item->nama }}</td>
                                                                <td>{{ $item->stok }}</td>

                                                                <td class="text-center">
                                                                    <a class="label label-primary"
                                                                       href="{{ url('/produk/' . $item->id . '/edit') }}">Edit</a>
                                                                    <form
                                                                        action="{{ url('/produk' . '/' . $item->id) }}"
                                                                        method='post' style='display: inline;'
                                                                        onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <label class="label label-danger" href=""
                                                                               for='btnSubmit-{{ $item->id }}'
                                                                               style='cursor: pointer;'>Hapus</label>
                                                                        <button type="submit"
                                                                                id='btnSubmit-{{ $item->id }}'
                                                                                style="display: none;"></button>
                                                                    </form>

                                                                    <a class="label label-secondary  md-trigger"
                                                                       href="javascript:void(0)"
                                                                       data-modal="modal-{{ $item->id }}">Detail</a>

                                                                    <div class="md-modal md-effect-16"
                                                                         id="modal-{{ $item->id }}">
                                                                        <div class="md-content">
                                                                            <h3 class="bg-primary">Produk Detail</h3>
                                                                            <div>
                                                                                <form
                                                                                    action="{{ route('produk-detail.store') }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <input type="hidden"
                                                                                           name="produk_id"
                                                                                           value="{{ $item->id }}">
                                                                                    <input type="hidden"
                                                                                           name="from_produk_index"
                                                                                           value="ya">
                                                                                    <div class="form-group">
                                                                                        <input type="date"
                                                                                               name="tanggal"
                                                                                               class="form-control"
                                                                                               placeholder="Input tanggal"
                                                                                               value="{{ now()->toDateString() }}">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="number"
                                                                                               name="jumlah"
                                                                                               class="form-control"
                                                                                               placeholder="Input jumlah (KG)">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="number"
                                                                                               name="harga_beli"
                                                                                               class="form-control"
                                                                                               placeholder="Input Harga Beli">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input type="number"
                                                                                               name="harga_jual"
                                                                                               class="form-control"
                                                                                               placeholder="Input Harga Jual">
                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <button
                                                                                            @if($item->total === 0) disabled
                                                                                            @endif class="btn btn-primary"
                                                                                            type="submit"
                                                                                            style="display: inline-block;">
                                                                                            Tambah
                                                                                        </button>
                                                                                        <button
                                                                                            class="btn btn-outline-secondary md-close"
                                                                                            style="display: inline-block;"
                                                                                            type="button">Batalkan
                                                                                        </button>
                                                                                    </div>
                                                                                </form>

                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                        <thead>
                                                                                        <th>No</th>
                                                                                        <th>Tanggal</th>
                                                                                        <th>Jumlah</th>
                                                                                        <th>Harga Beli</th>
                                                                                        <th>Harga Jual</th>
                                                                                        <th>Aksi</th>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                        @foreach($item->produk_details as $itemProdukDetail)
                                                                                            <tr>
                                                                                                <td>{{ $loop->iteration }}</td>
                                                                                                <td>{{ \Carbon\Carbon::parse($itemProdukDetail->tanggal)->toDateString() }}</td>
                                                                                                <td>{{ $itemProdukDetail->jumlah }}</td>
                                                                                                <td>{{ toIdr($itemProdukDetail->harga_beli) }}</td>
                                                                                                <td>{{ toIdr($itemProdukDetail->harga_jual) }}</td>
                                                                                                <td>
                                                                                                    <a class="label label-primary"
                                                                                                       href="{{ url('/produk-detail/' . $itemProdukDetail->id . '/edit') }}">Edit</a>
                                                                                                    <form
                                                                                                        action="{{ url('/produk-detail' . '/' . $itemProdukDetail->id) }}"
                                                                                                        method='post'
                                                                                                        style='display: inline;'
                                                                                                        onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                                                                        @method('DELETE')
                                                                                                        @csrf
                                                                                                        <label
                                                                                                            class="label label-danger"
                                                                                                            href=""
                                                                                                            for='btnSubmit-{{ $itemProdukDetail->id }}'
                                                                                                            style='cursor: pointer;'>Hapus</label>
                                                                                                        <button
                                                                                                            type="submit"
                                                                                                            id='btnSubmit-{{ $itemProdukDetail->id }}'
                                                                                                            style="display: none;"></button>
                                                                                                    </form>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md-overlay"></div>

    <script>
        const locationHrefHapusSemua = "{{ url('produk/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('produk/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('produk/create') }}";
        var columnOrders = [{{ $produk_count }}];
        var urlSearch = "{{ url('produk') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection