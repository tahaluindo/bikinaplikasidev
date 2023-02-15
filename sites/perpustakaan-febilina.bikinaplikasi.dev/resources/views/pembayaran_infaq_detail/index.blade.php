@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Infaq Detail ({{ $pembayaranInfaq->tahun }})</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran Infaq Detail</li>
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
                                    <th>Nama</th>
                                    <th class="text-center">Kelas</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nominal Dibayar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran_infaq_details as $pembayaran_infaq_detail)
                                <tr data-id="{{ $pembayaran_infaq_detail->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pembayaran_infaq_detail->user->nama }}</td>
                                    <td class="text-center">{{ $pembayaran_infaq_detail->user->kelas->nama }}</td>
                                    <td>{{ $pembayaran_infaq_detail->status }}</td>
                                    <td>{{ $pembayaran_infaq_detail->tanggal_bayar }}</td>
                                    <td>{{ toIdr($pembayaran_infaq_detail->nominal_dibayar) }}</td>
                                    <td class='text-center'>
                                        <label class="badge badge-info" data-toggle="popover"
                                            data-content="Dibuat: {{ $pembayaran_infaq_detail->created_at }} <br> Diupdate: {{ $pembayaran_infaq_detail->updated_at }} <br> Catatan: {{ $pembayaran_infaq_detail->catatan }}"
                                            data-placement="top"
                                            data-title='{{ $pembayaranInfaq->keterangan }}'>Detail</label>
                                        <a class="badge badge-primary"
                                            href="{{ route('pembayaran_infaq_detail.edit', ['pembayaran_infaq' => $pembayaranInfaq->id, 'pembayaran_infaq_detail' => $pembayaran_infaq_detail->id]) }}">Edit</a>
                                        <form
                                            action="{{ route('pembayaran_infaq_detail.destroy', ['pembayaran_infaq' => $pembayaranInfaq->id, 'pembayaran_infaq_detail' => $pembayaran_infaq_detail->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger" href=""
                                                for='btnSubmit-{{ $pembayaran_infaq_detail->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $pembayaran_infaq_detail->id }}'
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
</div>

<script>
    var locationHrefHapusSemua = "{{ url('pembayaran_infaq_detail/hapus_semua') }}";
    var locationHrefCreate = "{{ route('pembayaran_infaq_detail.create', $pembayaranInfaq->id) }}";
    var columnOrders = [5];
    var urlSearch = "{{ route('pembayaran_infaq_detail.index', $pembayaranInfaq->id) }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter data...";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
