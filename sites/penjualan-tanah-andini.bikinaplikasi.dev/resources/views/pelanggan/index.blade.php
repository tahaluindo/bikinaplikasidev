@extends('layouts.app')

@section('content')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Pelanggan</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pelanggan</a></li>
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

                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pelanggan as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->no_hp }}</td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/pelanggan/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/pelanggan' . '/' . $item->id) }}"
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

                                <script>
                                    const locationHrefHapusSemua = "{{ url('pelanggan/hapus_semua') }}";
                                    const locationHrefAktifkanSemua = "{{ url('pelanggan/aktifkan_semua') }}";
                                    const locationHrefCreate = "{{ url('pelanggan/create') }}";
                                    var columnOrders = [{{ $pelanggan_count }}];
                                    var urlSearch = "{{ url('pelanggan') }}";
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
