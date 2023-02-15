@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ ucwords("kos") }}</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords("kos") }}</li>
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
                                            <th>Pemilik</th>
                                            <th>Nama</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Alamat Gmaps</th>
                                            <th>Deskripsi</th>
                                            <th>No Hp</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Fasilitas</th>
                                            <th>Gambar</th>
                                            {{--                                            <th>Gambar 2</th>--}}
                                            {{--                                            <th>Gambar 3</th>--}}
                                            {{--                                            <th>Gambar 4</th>--}}
                                            {{--                                            <th>Gambar 5</th>--}}
                                            <th>Kategori</th>
                                            <th>Harga Terendah</th>
                                            <th>Harga Tertinggi</th>
                                            <th>Kamar Kosong</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($kos->sortBy('status') as $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $item->pemilik }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->alamat_lengkap }}</td>
                                                <td>{{ $item->alamat_gmaps }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->no_hp }}</td>
                                                <td>{{ $item->jumlah_kamar }}</td>
                                                <td>{{ $item->fasilitas }}</td>

                                                <td>
                                                    @if($item->gambar)
                                                        <a href="{{ url($item->gambar) }}">
                                                            <img src="{{ url($item->gambar) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                {{--                                                --}}
                                                {{--                                                <td>--}}
                                                {{--                                                    @if($item->gambar2)--}}
                                                {{--                                                        <a href="{{ url($item->gambar2) }}">--}}
                                                {{--                                                            <img src="{{ url($item->gambar2) }}" width="50" height="50">--}}
                                                {{--                                                        </a>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </td>--}}
                                                {{--                                                --}}
                                                {{--                                                <td>--}}
                                                {{--                                                    @if($item->gambar3)--}}
                                                {{--                                                        <a href="{{ url($item->gambar3) }}">--}}
                                                {{--                                                            <img src="{{ url($item->gambar3) }}" width="50" height="50">--}}
                                                {{--                                                        </a>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </td>--}}
                                                {{--                                                --}}
                                                {{--                                                <td>--}}
                                                {{--                                                    @if($item->gambar4)--}}
                                                {{--                                                        <a href="{{ url($item->gambar4) }}">--}}
                                                {{--                                                            <img src="{{ url($item->gambar4) }}" width="50" height="50">--}}
                                                {{--                                                        </a>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </td>--}}
                                                {{--                                                --}}
                                                {{--                                                <td>--}}
                                                {{--                                                    @if($item->gambar5)--}}
                                                {{--                                                        <a href="{{ url($item->gambar5) }}">--}}
                                                {{--                                                            <img src="{{ url($item->gambar5) }}" width="50" height="50">--}}
                                                {{--                                                        </a>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </td>--}}

                                                <td>{{ $item->kategori }}</td>
                                                <td>{{ toIdr($item->harga_terendah) }}</td>
                                                <td>{{ toIdr($item->harga_tertinggi) }}</td>
                                                <td>{{ $item->kamar_kosong }}</td>

                                                <td class="text-center">
                                                    @if($kos->where('user_id', $item->user_id)->count() == 1)
                                                        @if($user = $user->where('id', $item->user_id)->first())
                                                            @if($user->status == 'Pencari Kos')
                                                                <a onclick="return confirm('Set sebagai pemilik kos?')" class="label label-primary"
                                                                   href="{{ url('/user/set-pemilik-kos/' . $user->id) }}">Set
                                                                    Pemilik Kos</a>
                                                            @endif
                                                        @endif
                                                    @endif

                                                    <a class="label label-primary"
                                                       href="{{ url('/kos/' . $item->id . '/edit') }}">Edit</a>

                                                    <form action="{{ url('/kos' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('kos/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('kos/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('kos/create') }}";
        var columnOrders = [{{ $kos_count - 15}}];
        var urlSearch = "{{ url('kos') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection