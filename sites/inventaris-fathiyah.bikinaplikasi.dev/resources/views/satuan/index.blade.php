@extends('layouts.app3')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="media-body">
                        <h4 class="page-header-title">Satuan</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row panel-wrapper js-grid-wrapper">

            <div class="col-xs-12 col-md-12 js-grid">
                <div class="panel px-1">
                    <div class="panel-body">
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

                        <div class="table-stats order-table ov-h">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($satuan as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>

                                        <td class="text-center">
                                            <a class="label label-primary"
                                               href="{{ url('/satuan/' . $item->id . '/edit') }}">Edit</a>
                                            <form action="{{ url('/satuan' . '/' . $item->id) }}"
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

    <script>
        const locationHrefHapusSemua = "{{ url('satuan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('satuan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('satuan/create') }}";
        var columnOrders = [{{ $satuan_count }}];
        var urlSearch = "{{ url('satuan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
