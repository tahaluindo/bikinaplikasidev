@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Transaksi Lainnya Detail ({{ $transaksiLainnya->nama }})</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi Lainnya Detail</li>
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
                        <table class="table table-sm" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=5>No</th>
                                    <th>Nominal Dibayar</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi_lainnya_details as $transaksi_lainnya_detail)
                                <tr data-id="{{ $transaksi_lainnya_detail->id }}">
                                    <td>{{ $loop->iteration }}
                                    <td>{{ toIdr($transaksi_lainnya_detail->nominal_dibayar) }}
                                    <td>{{ $transaksi_lainnya_detail->status }}
                                    <td>{{ $transaksi_lainnya_detail->tanggal_bayar }}
                                    <td class='text-center'>
                                        <label class="badge badge-info" data-toggle="popover"
                                            data-content="Dibuat: {{ $transaksi_lainnya_detail->created_at }} <br> Diupdate: {{ $transaksi_lainnya_detail->updated_at }}"
                                            data-placement="top"
                                            data-title='{{ $transaksiLainnya->nama }}'>Detail</label>
                                        @if(auth()->user()->level == 'superadmin')
                                        <a class="badge badge-primary"
                                            href="{{ route('transaksi_lainnya_detail.edit', ['transaksi_lainnya' => $transaksiLainnya->id, 'transaksi_lainnya_detail' => $transaksi_lainnya_detail->id]) }}">Edit</a>
                                        <form
                                            action="{{ route('transaksi_lainnya_detail.destroy', ['transaksi_lainnya' => $transaksiLainnya->id, 'transaksi_lainnya_detail' => $transaksi_lainnya_detail->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger" href=""
                                                for='btnSubmit-{{ $transaksi_lainnya_detail->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $transaksi_lainnya_detail->id }}'
                                                style="display: none;"></button>
                                        </form>
                                        @endif
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
    var locationHrefHapusSemua = "{{ route('transaksi_lainnya_detail.hapus_semua') }}";
    var locationHrefCreate = "{{ route('transaksi_lainnya_detail.create', $transaksiLainnya->id) }}";
    var columnOrders = [4];
    var urlSearch = "{{ route('transaksi_lainnya_detail.index', $transaksiLainnya->id) }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter data...";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
