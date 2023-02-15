@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ ucwords("tentang") }}</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords("tentang") }}</li>
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
                                            <th>Nama Developer</th>
                                            <th>Deskripsi</th>
                                            <th>Versi</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $tentang->nama_developer }}</td>
                                            <td>{{ $tentang->deskripsi }}</td>
                                            <td>{{ $tentang->versi }}</td>
                                            <td>{{ $tentang->email }}</td>
                                            <td>{{ $tentang->no_hp }}</td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/tentang/' . $tentang->id . '/edit') }}">Edit</a>
                                            </td>
                                        </tr>
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
        const locationHrefHapusSemua = "{{ url('tentang/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('tentang/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('tentang/create') }}";
        var columnOrders = [{{ $tentang_count }}];
        var urlSearch = "{{ url('tentang') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection