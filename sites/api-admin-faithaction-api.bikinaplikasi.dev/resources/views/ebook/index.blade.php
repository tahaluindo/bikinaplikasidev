@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ ucwords("ebook") }}</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords("ebook") }}</li>
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
                                            <th width=3>No.</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Url</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ebook as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }}.</th>
                                                <td>{{ $item->ebook_kategori->nama }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>
                                                    @if($item->filePdf)
                                                    <a href="{{ url($item->filePdf) }}" target="_blank">Lihat</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->gambar)
                                                        <a href="{{ url($item->gambar) }}">
                                                            <img src="{{ url($item->gambar) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                
                                                <td class="text-center">
                                                    
                                                    <a class="label label-primary"
                                                       href="{{ url('/ebook/' . $item->id . '/edit') }}">Edit</a>

                                                    <form action="{{ url('/ebook' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('ebook/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('ebook/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('ebook/create') }}";
        var columnOrders = [{{ 0 }}];
        var urlSearch = "{{ url('ebook') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection