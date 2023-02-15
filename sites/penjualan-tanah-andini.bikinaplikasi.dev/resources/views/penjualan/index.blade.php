@extends('layouts.app')

@section('content')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Penjualan</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Penjualan</a></li>
                                    <li class="breadcrumb-item active">Index</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
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

                                <div class="activity-table table-responsive recent-table">
                                    <table class="table" id='dataTable'>
                                        <thead>
                                        <tr>
                                            <th width=2>#</th>
                                            <th>Pelanggan Id</th>
                                            <th>Kavling Id</th>
                                            <th>Cara Pembayaran</th>
                                            <th>Lama Angsuran (Bulan)</th>
                                            <th>Batas Pembayaran</th>
                                            <th>Dp</th>
                                            <th>Biaya Ppjb</th>
                                            <th>Biaya Shm</th>
                                            <th>Total</th>
                                            <th>Catatan</th>
                                            <th>Lunas</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($penjualan as $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $item->pelanggan->nama }}</td>
                                                <td>{{ $item->kavling->nomor_kavling }} <strong>({{ toIdr($item->kavling->harga) }})</strong></td>
                                                <td>{{ $item->cara_pembayaran }}</td>
                                                <td>{{ $item->lama_angsuran }}</td>
                                                <td>{{ $item->batas_pembayaran }}</td>
                                                <td>{{ toIdr($item->dp) }}</td>
                                                <td>{{ toIdr($item->biaya_ppjb) }}</td>
                                                <td>{{ toIdr($item->biaya_shm) }}</td>
                                                <td>{{ toIdr($item->total) }}</td>
                                                <td>{{ $item->catatan }}</td>
                                                <td>{{ $item->status }}</td>
                                               

                                                <td class="text-center">
                                                    
                                                    @if($item->status == "DP")
                                                    <a class="label label-danger"
                                                       onclick="uang_dikembalikan = prompt('Input jumlah uang untuk dikembalikan', '0'); uang_dikembalikan > 0 ? location.href = '{{ url("/penjualan/batalkan/$item->id") }}?uang_dikembalikan=' + uang_dikembalikan : 0;">Batalkan</a>    
                                                    <a class="label label-primary"
                                                       href="{{ url('/penjualan/' . $item->id . '/edit') }}">Edit</a>
                                                    @endif
                                                    
                                                    @if($item->status != "DP" && $item->status != "Dibatalkan")
                                                    <a class="label label-info"
                                                       href="{{ url('/angsuran') }}?penjualan_id={{ $item->id }}">Angsuran ({{ $item->angsurans->count() }})</a>
                                                    @endif
                                                        
                                                    <form action="{{ url('/penjualan' . '/' . $item->id) }}"
                                                          method='post' style='display: inline;'
                                                          onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <label class="label label-danger" href=""
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
                                </div>

                                <script>
                                    const locationHrefHapusSemua = "{{ url('penjualan/hapus_semua') }}";
                                    const locationHrefAktifkanSemua = "{{ url('penjualan/aktifkan_semua') }}";
                                    const locationHrefCreate = "{{ url('penjualan/create') }}";
                                    var columnOrders = [{{ 0 }}];
                                    var urlSearch = "{{ url('penjualan') }}";
                                    var q = "{{ $_GET['q'] ?? '' }}";
                                    var placeholder = "Filter...";
                                    var tampilkan_buttons = true;
                                    var button_manual = true;
                                </script>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Minible.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/"
                                                                                         target="_blank"
                                                                                         class="text-reset">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
