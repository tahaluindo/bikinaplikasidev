@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Peminjaman</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Peminjaman</li>
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
                                    <th>Anggota Id</th>
                                    <th>User Petugas Id</th>
                                    <th>Tanggal</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjaman as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->anggota->nama }}</td>
                                    <td>{{ $item->user_petugas->name }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->tanggal_pengembalian }}</td>
                                    <td>{{ $item->status  }}</td>

                                    <td class="text-center">
                                        @if(now()->lte(\Carbon\Carbon::parse($item->tanggal_pengembalian)) && (now()->diffInDays(Carbon\Carbon::parse($item->tanggal_pengembalian)) <= env('APP_MIN_HARI_KIRIM_PEMBERITAHUAN')) && $item->status == 'Berlangsung')
                                        <a class="label label-success" href="{{ str_replace('#no_telepon#', $item->anggota->no_telepon, env('APP_LINK_WA_PEMBERITAHUAN')) }}">Kirim Pemberitahuan</a>
                                        @endif

                                        <a class="label label-info" href="{{ url('/peminjaman/' . $item->id) }}">Detail / Pengembalian</a>
                                        <a class="label label-primary" href="{{ url('/peminjaman/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/peminjaman' . '/' . $item->id) }}" method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $item->id }}' style="display: none;"></button>
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
    const locationHrefHapusSemua = "{{ url('peminjaman/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('peminjaman/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('peminjaman/create') }}";
    var columnOrders = [{{ $peminjaman_count }}];
    var urlSearch = "{{ url('peminjaman') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection
