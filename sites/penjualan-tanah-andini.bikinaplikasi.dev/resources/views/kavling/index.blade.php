@extends('layouts.app')

@section('content')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Kavling</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kavling</a></li>
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

                                <div class="activity-table table-responsive recent-table">
                                    <table class="table" id='dataTable'>
                                        <thead>
                                        <tr>
                                            <th width=2>#</th>
                                            <th>Kategori Id</th>
                                            <th>Luas Tanah</th>
                                            <th>Nomor Kavling</th>
                                            <th>Harga</th>
                                            <th>Angsuran</th>
                                            <th>Ukuran</th>
                                            <th>Tipe</th>
                                            <th>No Ppjb</th>
                                            <th>No Ajb</th>
                                            <th>Status</th>
                                            <th>Gambar</th>
                                            <th>Blok</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($kavling as $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $item->kategori->nama }}</td>
                                                <td>{{ $item->luas_tanah }}</td>
                                                <td>{{ $item->nomor_kavling }}</td>
                                                <td>{{ toIdr($item->harga) }}</td>
                                                <td>{{ toIdr($item->angsuran) }}</td>
                                                <td>{{ $item->ukuran }}</td>
                                                <td>{{ $item->tipe }}</td>
                                                <td>{{ $item->no_ppjb }}</td>
                                                <td>{{ $item->no_ajb }}</td>
                                                <td>{{ $item->status }}</td>

                                                @if($item->gambar ?? "")
                                                    <td class="border">
                                                        <a href="{{ url($item->gambar ?? "") }}">
                                                            <img src="{{ url($item->gambar ?? "") }}" alt="" srcset=""
                                                                 width="50" height="50">
                                                        </a>
                                                    </td>
                                                @else
                                                    <td>
                                                        
                                                    </td>
                                                @endif
                                                <td>{{ $item->blok }}</td>

                                                <td class="text-center">
                                                    <a class="label label-primary"
                                                       href="{{ url('/kavling/' . $item->id . '/edit') }}">Edit</a>
                                                    <form action="{{ url('/kavling' . '/' . $item->id) }}"
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

                                <script>
                                    const locationHrefHapusSemua = "{{ url('kavling/hapus_semua') }}";
                                    const locationHrefAktifkanSemua = "{{ url('kavling/aktifkan_semua') }}";
                                    const locationHrefCreate = "{{ url('kavling/create') }}";
                                    var columnOrders = [{{ $kavling_count - 3 }}];
                                    var urlSearch = "{{ url('kavling') }}";
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
