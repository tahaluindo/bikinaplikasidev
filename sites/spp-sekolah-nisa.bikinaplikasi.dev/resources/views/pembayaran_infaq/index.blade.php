@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Infaq</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran Infaq</li>
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
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran_infaqs as $pembayaran_infaq)
                                <tr data-id="{{ $pembayaran_infaq->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran_infaq_detail.index', ['pembayaran_infaq' => $pembayaran_infaq->id]) }}">{{ $pembayaran_infaq->tahun }}</a>
                                    </td>
                                    <td>{{ toIdr($pembayaran_infaq->nominal) }}</td>
                                    <td>{{ $pembayaran_infaq->keterangan }}</td>
                                    <td class='text-center'>
                                        <a class="label label-primary" href="{{ route('pembayaran_infaq.edit', ['pembayaran_infaq' => $pembayaran_infaq->id]) }}">Edit</a>
                                        <form action="{{ route('pembayaran_infaq.destroy', ['pembayaran_infaq' => $pembayaran_infaq->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $pembayaran_infaq->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $pembayaran_infaq->id }}'
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
    var locationHrefHapusSemua = "{{ route('pembayaran_infaq.hapus_semua') }}";
    var locationHrefCreate = "{{ route('pembayaran_infaq.create') }}";
    var columnOrders = [4];
    var urlSearch = "{{ url('pembayaran_infaq') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter data...";
    var tampilkan_buttons = true;
    var button_manual = true;

    // khusus export
    var locationHrefExport = "{{ route('pembayaran_infaq.import_or_export') }}";
</script>
@endsection
