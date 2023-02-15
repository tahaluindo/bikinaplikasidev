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
                                                <li class="breadcrumb-item"><a href="#!">Pembeli</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-12 col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>Pembeli</h5>
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
                                                                <th>Nama</th><th>Keterangan</th>
                                                                <th class="text-center">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($pembeli as $item)
                                                            <tr data-id='{{ $item->id }}'>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                    
                                                                <td>{{ $item->nama }}</td><td>{{ $item->keterangan }}</td>
                                                    
                                                                <td class="text-center">
                                                                    <a class="label label-primary"
                                                                        href="{{ url('/pembeli/' . $item->id . '/edit') }}">Edit</a>
                                                                    <form action="{{ url('/pembeli' . '/' . $item->id) }}"
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
    
    <script>
        const locationHrefHapusSemua = "{{ url('pembeli/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pembeli/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pembeli/create') }}";
        var columnOrders = [{{ $pembeli_count }}];
        var urlSearch = "{{ url('pembeli') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection