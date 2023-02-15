@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Pembelian</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pembelian
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
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
                    
                    <table class="table" id='dataTable'>
                        <thead>
                        <tr>
                            <th class="border" width=2>#</th>
                            <th class="border">Pemasok Id</th>
                            <th class="border">Status</th>
                            <th class="border">Catatan</th>
                            <th class="border text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pembelian as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td class="border">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border">{{ $item->pemasok->nama }}</td>
                                <td class="border">{{ $item->status }}</td>
                                <td class="border">{{ $item->catatan }}</td>

                                <td class="text-center border">
                                    <div class="tabulator-cell" role="gridcell"
                                         style="width: 305px; text-align: center; display: inline-flex; align-items: center; justify-content: center; height: 24px;"
                                         tabulator-field="actions" title="">
                                        <div class="flex lg:justify-center">

                                            <a class="label label-info  flex mr-3"
                                               href="{{ url('/pembelian-detail?pembelian_id=' . $item->id) }}">Detail</a>

                                            <a class="edit flex mr-3"
                                               href="{{ url('/pembelian/' . $item->id . '/edit') }}">
                                                Edit
                                            </a>

                                            <a class="delete flex text-theme-6" href="javascript:;">

                                                <form action="{{ url('/pembelian' . '/' . $item->id) }}"
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

                                            </a>
                                        </div>
                                        <div class="tabulator-col-resize-handle"></div>
                                        <div class="tabulator-col-resize-handle prev"></div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "{{ url('pembelian/hapus_semua') }}";
                        const locationHrefAktifkanSemua = "{{ url('pembelian/aktifkan_semua') }}";
                        const locationHrefCreate = "{{ url('pembelian/create') }}";
                        var columnOrders = [{{ $pembelian_count - 4 }}];
                        var urlSearch = "{{ url('pembelian') }}";
                        var q = "{{ $_GET['q'] ?? '' }}";
                        var placeholder = "Filter...";
                        var tampilkan_buttons = true;
                        var button_manual = true;
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
