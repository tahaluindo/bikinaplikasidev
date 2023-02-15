@extends('layouts.app')

@section('content')

    <div class="" style="margin-bottom: 10px;">
        <a class="btn btn-info btn-sm" href="?status=Belum Diproses">Belum Diproses</a>
        <a class="btn btn-success btn-sm" href="?status=Dibayar">Dibayar</a>
        <a class="btn btn-danger btn-sm" href="?status=Dibatalkan">Dibatalkan</a>
    </div>
    
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Penjual Id</th>
            <th>Meja Id</th>
            <th>Atas Nama</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pesanan as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->penjual->user->name }}</td>
                <td>{{ $item->meja->no }}</td>
                <td>{{ $item->atas_nama }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ toIdr($item->pesanan_details->sum('total')) }}</td>

                <td>
                    @if(in_array($item->status, ['Belum Diproses']))
                        <a href='{{ route('pesanan.proses', $item->id) }}' class='btn btn-sm btn-primary'
                           onclick='return confirm("Proses pesanan?")'>Proses</a>
                        <a href='{{ route('pesanan.batalkan', $item->id) }}' class='btn btn-sm btn-warning'
                           onclick='return confirm("Batalkan pesanan?")'>Batalkan</a>
                    @endif

                    @if(in_array($item->status, ['Diproses']))
                        <a href='{{ route('pesanan.selesai', $item->id) }}' class='btn btn-sm btn-success'
                           onclick='return confirm("Selesaikan pesanan?")'>Selesaikan</a>
                    @endif

                    <a href='{{ route('pesanan_detail.index') }}?pesanan_id={{ $item->id }}'
                       class='btn btn-sm btn-info'>Detail</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const locationHrefHapusSemua = "{{ url('pesanan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pesanan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pesanan/create') }}";
        var columnOrders = [{{ $pesanan_count - 2}}];
        var urlSearch = "{{ url('pesanan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;

        setInterval(() => {
            location.reload()
        }, 1000 * 15);

    </script>
@endsection