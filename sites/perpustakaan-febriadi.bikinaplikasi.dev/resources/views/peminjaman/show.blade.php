@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Peminjaman</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Peminjaman</li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table" style='margin-bottom: 50px;'>
                            <thead>
                            <tr>
                                <th>Anggota Id</th>
                                <th>User Petugas Id</th>
                                <th>Tanggal</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr data-id='{{ $peminjaman->id }}'>
                                <td>{{ $item->anggota->nama }}</td>
                                <td>{{ $item->user_petugas->name }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->tanggal_pengembalian }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <h1 class="page-head-line">Detail Peminjaman</h1>
                        <table class="table" id='dataTable' style='margin-bottom: 50px;'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Buku Id</th>
                                <th>Status</th>
                                @if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan']))
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detail_peminjaman as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->status }}</td>

                                    @if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan']))
                                        <td class="text-center">
                                            <a class="badge badge-primary"
                                               href="{{ url('/detail_peminjaman/' . $item->id . "/edit?peminjaman_id=$peminjaman->id") }}">Edit</a>
                                            <form
                                                action="{{ url('/detail_peminjaman' . '/' . $item->id . "?peminjaman_id=$peminjaman->id") }}"
                                                method='post' style='display: inline;'
                                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                @method('DELETE')
                                                @csrf
                                                <label class="badge badge-danger" href=""
                                                       for='btnSubmit-{{ $item->id }}'
                                                       style='cursor: pointer;'>Hapus</label>
                                                <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                        style="display: none;"></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>
                                    <strong>Jumlah</strong>
                                </td>
                                <td>
                                    <strong>{{ $detail_peminjaman->count() }}</strong>
                                </td>
                                <td></td>
                                @if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan']))
                                    <td></td>
                                @endif
                            </tr>
                            </tfoot>
                        </table>

                        <h1 class="page-head-line">
                            Pengembalian
                            @if($peminjaman->detail_peminjaman->count() && in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan']))
                                <a class='btn btn-success'
                                   href="{{ route('pengembalian.create') . "?peminjaman_id=$peminjaman->id" }}">Proses
                                    Pengembalian
                                    (Denda: {{ toIdr(isset($pengembalian->denda_terlambat) ? $pengembalian->denda_terlambat : (now() > Carbon\Carbon::parse($peminjaman->tanggal_pengembalian) ? now()->diffInDays(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)) * env('APP_DENDA_TERLAMBAT_PER_HARI') : 0)) }}
                                    )</a>
                                <a class='btn btn-success text-white'
                                   onclick='var waktu_perpanjangan = window.prompt("Masukkan jumlah perpanjangan, default {{ env("APP_WAKTU_PERPANJANGAN") }} hari?", {{ env("APP_WAKTU_PERPANJANGAN") }}); if (waktu_perpanjangan != null) location.href = "{{ route("peminjaman.perpanjangan", $peminjaman->id) }}?waktu_perpanjangan=" + waktu_perpanjangan'>Perpanjangan</a>
                            @else
                                @if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan']))
                                    <a class='btn btn-success disabled'>Tidak Meminjam Buku</a>
                                @else
                                    <a class='btn btn-success disabled'>Sudah Dikembalikan</a>
                                @endif
                            @endif
                        </h1>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Denda Terlambat</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($peminjaman->pengembalian)
                                <tr data-id='{{ $pengembalian->id }}'>
                                    <td>{{ $pengembalian->tanggal }}</td>
                                    <td>{{ toIdr($pengembalian->denda_terlambat) }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan']))
        const locationHrefHapusSemua = "{{ url('detail_peminjaman/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('detail_peminjaman/aktifkan_semua') }}";
        const locationHrefCreate = '{{ url("detail_peminjaman/create?peminjaman_id=$peminjaman->id") }}';
        var columnOrders = [{{ $detail_peminjaman_count - 1 }}];
        var urlSearch = "{{ url('detail_peminjaman?peminjaman_id=$peminjaman->id') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
        @endif
    </script>
@endsection

