@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Detail Peminjaman</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Detail Peminjaman</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Buku Id</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detail_peminjaman as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>{{ $item->buku_id }}</td>
                                    <td>{{ $item->status }}</td>

                                    <td class="text-center">
                                        <a class="badge badge-primary"
                                           href="{{ url('/detail_peminjaman/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/detail_peminjaman' . '/' . $item->id) }}"
                                              method='post' style='display: inline;'
                                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger" href="" for='btnSubmit-{{ $item->id }}'
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


    <script>
        const locationHrefHapusSemua = "{{ url('detail_peminjaman/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('detail_peminjaman/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('detail_peminjaman/create') }}";
        var columnOrders = [{{ $detail_peminjaman_count }}];
        var urlSearch = "{{ url('detail_peminjaman') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
