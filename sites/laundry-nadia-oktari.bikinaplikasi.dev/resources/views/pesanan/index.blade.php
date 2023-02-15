@extends('layouts.app4')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Pesanan</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="card px-1">
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

                                <div class="table-stats order-table ov-h table-responsive">

                                    <table class="table" id='dataTable'>
                                        <thead>
                                        <tr>
                                            <th width=2>#</th>
                                            <th>No Transaksi</th>
                                            <th>Pelanggan Id</th>
                                            <th>Paket Id</th>
                                            <th>Jumlah</th>
                                            <th>Dipesan Pada</th>
                                            <th>Diambil Pada</th>
                                            <th>Status</th>
                                            <th>Admin</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pesanan as $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->pelanggan ? $item->pelanggan->nama : "-" }}</td>
                                                <td>{{ $item->paket->nama }}</td>
                                                <td>{{ $item->jumlah }} {{ $item->paket->satuan }}</td>
                                                <td>{{ $item->dipesan_pada }}</td>
                                                <td>{{ $item->diambil_pada }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ toIdr($item->admin) }}</td>
                                                <td>{{ toIdr($item->diskon) }}</td>
                                                <td>{{ toIdr($item->total) }}</td>
                                                <td>{{ $item->status }}</td>

                                                <td class="text-center">
                                                        
                                                    @if($item->status == 'Belum Diproses')
                                                    <a class="badge badge-info"
                                                       href="{{ url('/pesanan/' . $item->id . '/proses') }}" onclick="return confirm('Yakin akan memproses pesanan?')">Proses</a>
                                                    @endif
                                                    
                                                    @if($item->status == 'Sedang Diproses')
                                                    <a class="badge badge-success"
                                                       href="{{ url('/pesanan/' . $item->id . '/selesai') }}"  onclick="return confirm('Yakin akan menyelesaikan pesanan?')">Selesai</a>
                                                    @endif
                                                    
                                                    <a class="label label-primary"
                                                       onclick="window.open('{{ url('/pesanan/' . $item->id . '/print-nota') }}', '_blank')" style="cursor: pointer;">Print</a>
                                                        
                                                    <a class="label label-primary"
                                                       href="{{ url('/pesanan/' . $item->id . '/edit') }}">Edit</a>
                                                        
                                                    <form action="{{ url('/pesanan' . '/' . $item->id) }}"
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('pesanan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pesanan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pesanan/create') }}";
        var columnOrders = [{{ $pesanan_count - 5 }}];
        var urlSearch = "{{ url('pesanan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
