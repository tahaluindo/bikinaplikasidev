@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pengembalian</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pengembalian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Peminjaman Id</th>
                                    <th>Tanggal</th>
                                    <th>Denda Terlambat</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengembalian as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->peminjaman->anggota->nama }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ toIdr($item->denda_terlambat) }}</td>
                                    <td>{{ $item->peminjaman->tanggal }}</td>
                                    <td>{{ $item->peminjaman->tanggal_pengembalian }}</td>

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
    const locationHrefHapusSemua = "{{ url('pengembalian/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('pengembalian/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('pengembalian/create') }}";
    var columnOrders = [{{ $pengembalian_count }}];
    var urlSearch = "{{ url('pengembalian') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = false;
    var button_manual = false;
</script>
@endsection
