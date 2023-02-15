@extends('layouts.app')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>{{ ucwords('pembayaran') }}</h2>
                    </div>
                    <div class="col-lg-6 breadcrumb-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </a></li>
                            <li class="breadcrumb-item">{{ ucwords('pembayaran') }}</li>
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

                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                            @elseif(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @elseif(session()->has('warning'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session()->get('warning') }}
                                </div>
                            @endif

                            <div class="activity-table table-responsive recent-table">
                                <table class="table" id='dataTable'>
                                    <thead>
                                        <tr>
                                            <th width=2>#</th>
                                            <th>Jenjang</th>
                                            <th>Kelas</th>
                                            {{-- <th>Angkatan</th> --}}
                                            <th>untuk bulan</th>
                                            <th>Nominal</th>
                                            <th>Tempo</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembayaran as $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $item->jenjang->nama }}</td>
                                                <td>{{ $item->kelas->nama }}</td>
                                                {{-- <td>{{ $item->angkatan }}</td> --}}
                                                <td>{{ $item->untuk_bulan }}</td>

                                                <td>{{ toIdr($item->nominal) }}</td>
                                                <td>
                                                    @if (auth()->user()->level == 'Admin')
                                                        {{ $item->tempo }}
                                                    @endif

                                                    @if (auth()->user()->level == 'Siswa')
                                                        @if (date('Y-m-d') > $item->tempo &&
                                                            $item->pembayaran_details->whereIn('siswa_id', [
                                                                    auth()->user()->getSiswa()->id,
                                                                ])->first()->status == 'Belum Dibayar')
                                                            {{ $item->tempo }} (TUNGGAKAN)
                                                        @elseif($item->pembayaran_details->whereIn('siswa_id', [
                                                                auth()->user()->getSiswa()->id,
                                                            ])->first()->status == 'Diterima')
                                                            {{ $item->tempo }} (SUDAH DIBAYAR)
                                                        @elseif($item->pembayaran_details->whereIn('siswa_id', [
                                                                auth()->user()->getSiswa()->id,
                                                            ])->first()->status == 'Menunggu Konfirmasi')
                                                            {{ $item->tempo }} (MENUNGGU KONFIRMASI)
                                                        @else
                                                            {{ $item->tempo }} (BELUM DIBAYAR)
                                                        @endif
                                                    @endif
                                                </td>

                                                @if (auth()->user()->level == 'Admin')
                                                    <td class="text-center">
                                                        <a class="label label-primary"
                                                            href="{{ url('/pembayaran-detail?pembayaran_id=' . $item->id) }}">Detail</a>
                                                        <a class="label label-primary"
                                                            href="{{ url('/pembayaran/' . $item->id . '/edit') }}">Edit</a>
                                                        <form action="{{ url('/pembayaran' . '/' . $item->id) }}"
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
                                                @endif

                                                @if (in_array(auth()->user()->level, ['Siswa', 'Ortu']))
                                                    @if (in_array(auth()->user()->level, ['Siswa', 'Ortu']))
                                                        <td>
                                                            @if ($item->pembayaran_details->whereIn('siswa_id', [
                                                                    auth()->user()->getSiswa()->id,
                                                                ])->first()->status == 'Belum Dibayar')
                                                                <a class="label label-primary"
                                                                    href="{{ url('/pembayaran-detail/create?pembayaran_id=' . $item->id) }}">Lakukan
                                                                    Pembayaran</a>
                                                            @endif

                                                            @if ($item->pembayaran_details->whereIn('siswa_id', [
                                                                    auth()->user()->getSiswa()->id,
                                                                ])->first()->status == 'Diterima')
                                                                {{ $item->pembayaran_details->whereIn('siswa_id', [auth()->user()->getSiswa()->id])->first()->status }}
                                                            @endif
                                                        </td>
                                                    @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head21"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->level == 'Admin')
        <script>
            const locationHrefHapusSemua = "{{ url('pembayaran/hapus_semua') }}";
            const locationHrefAktifkanSemua = "{{ url('pembayaran/aktifkan_semua') }}";
            const locationHrefCreate = "{{ url('pembayaran/create') }}";
            var columnOrders = [0];
            var urlSearch = "{{ url('pembayaran') }}";
            var q = "{{ $_GET['q'] ?? '' }}";
            var placeholder = "Filter...";
            var tampilkan_buttons = true;
            var button_manual = true;
        </script>
    @endif
@endsection
