@extends('layouts.app')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>{{ ucwords("pembayaran detail") }}
                            {{-- ({{ \App\Models\Pembayaran::find(request()->pembayaran_id)->angkatan }}) --}}
                        </h2>
                    </div>
                    <div class="col-lg-6 breadcrumb-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </a></li>
                            <li class="breadcrumb-item">{{ ucwords("pembayaran detail") }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12 xl-100 box-col-12">
                    <div class="card">
                        <div class="card-header no-border">
                            <ul class="creative-dots">
                                <li class="bg-primary big-dot"></li>
                                <li class="bg-secondary semi-big-dot"></li>
                                <li class="bg-warning medium-dot"></li>
                                <li class="bg-info semi-medium-dot"></li>
                                <li class="bg-secondary semi-small-dot"></li>
                                <li class="bg-primary small-dot"></li>
                            </ul>

                        </div>
                        <div class="card-body pt-0">

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
                                        <th>Siswa Id</th>
                                        <th>Jumlah</th>
                                        <th>Catatan</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Tempo</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pembayaran_detail as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->siswa->nama }}</td>
                                            <td>{{ toIdr($item->jumlah) }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>
                                                @if($item->gambar)
                                                    <a href="{{ url($item->gambar) }}">
                                                        <img src="{{ url($item->gambar) }}" height="50">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ date("Y-m-d") > $item->pembayaran->tempo && now()->diffInDays($item->pembayaran->tempo) >= 7 ? "TUNGGAKAN" : "BELUM DIBAYAR" }}</td>


                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/pembayaran-detail/' . $item->id . '/edit?pembayaran_id=' . request()->pembayaran_id) }}">Edit</a>
                                                <form action="{{ url('/pembayaran-detail' . '/' . $item->id) }}"
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
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head21" title="Copy"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('pembayaran-detail/hapus_semua?pembayaran_id=' . request()->pembayaran_id) }}";
        const locationHrefAktifkanSemua = "{{ url('pembayaran-detail/aktifkan_semua?pembayaran_id=' . request()->pembayaran_id) }}";
        const locationHrefCreate = "{{ url('pembayaran-detail/create?pembayaran_id=' . request()->pembayaran_id) }}";
        var columnOrders = [{{ 0 }}];
        var urlSearch = "{{ url('pembayaran-detail?pembayaran_id=' . request()->mapel_id) }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection