@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Santri</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran Santri</li>
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
                                    <th>Nominal Spp Default</th>
                                    <th>Nominal Uang Makan Default</th>
                                    {{-- <th>Nominal Spp Default (SD)</th> --}}
                                    <th>Keterangan</th>
                                    @if(auth()->user()->level == 'superadmin')
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran_santris as $pembayaran_santri)
                                <tr data-id="{{ $pembayaran_santri->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran_santri_detail.index', ['pembayaran_santri' => $pembayaran_santri->id]) }}">{{ $pembayaran_santri->tahun }}</a>
                                    </td>
                                    <td>{{ toIdr($pembayaran_santri->nominal_spp_default) }}</td>
                                    <td>{{ toIdr($pembayaran_santri->nominal_uang_makan_default) }}</td>
                                    {{-- <td>{{ toIdr($pembayaran_santri->nominal_spp_default_sd) }}</td> --}}
                                    <td>{{ $pembayaran_santri->keterangan }}</td>
                                    <td class='text-center'>
                                        @if(auth()->user()->level == 'superadmin')
                                        <a class="badge badge-primary" href="{{ route('pembayaran_santri.edit', ['pembayaran_santri' => $pembayaran_santri->id]) }}">Edit</a>
                                        <form action="{{ route('pembayaran_santri.destroy', ['pembayaran_santri' => $pembayaran_santri->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger" href="" for='btnSubmit-{{ $pembayaran_santri->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $pembayaran_santri->id }}'
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
    var locationHrefHapusSemua = "{{ route('pembayaran_santri.hapus_semua') }}";
    var locationHrefCreate = "{{ route('pembayaran_santri.create') }}";
    var columnOrders = [5];
    var urlSearch = "{{ url('pembayaran_santri') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter data...";
    var tampilkan_buttons = true;
    var button_manual = true;

    // khusus export
    var locationHrefExport = "{{ route('pembayaran_santri.import_or_export') }}";
</script>
@endsection
