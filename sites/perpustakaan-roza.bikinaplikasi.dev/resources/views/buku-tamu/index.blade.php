@extends('layouts.app3')

@section('content')
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap mt-3">
                    <h2 class="title-1">Buku Tamu</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12  mt-3">
                <div class="table-responsive m-b-40">
                    <table class="table" id='dataTable'>
                        <thead>
                        <tr>
                            <th width=2>#</th>
                            <th>Nama</th>
                            <th>Jumlah Berkunjung</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buku_tamu->sortBy('jumlah_berkunjung')->reverse() as $item)
                            <tr data-id='{{ $item->id }}'>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->anggota->nama }}
                                </td>
                                <td>
                                    {{ $item->jumlah_berkunjung }}
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('buku-tamu/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('buku-tamu/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('buku-tamu/create') }}";
        var columnOrders = [{{ $buku_tamu_count }}];
        var urlSearch = "{{ url('buku-tamu') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection
