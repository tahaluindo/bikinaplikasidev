@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Transaksi Lainnya</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi Lainnya</li>
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
                                    <th>Jenis</th>
                                    @if(auth()->user()->level == 'superadmin')
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi_lainnyas as $transaksi_lainnya)
                                <tr data-id="{{ $transaksi_lainnya->id }}">
                                    <td>{{ $loop->iteration }}
                                    <td>
                                        <a href="{{ route('transaksi_lainnya_detail.index', $transaksi_lainnya->id) }}">
                                            {{ $transaksi_lainnya->nama }}
                                        </a>
                                    </td>
                                    <td>{{ $transaksi_lainnya->jenis }}</td>
                                    <td class='text-center'>
                                        <a class="label label-primary"
                                            href="{{ route('transaksi_lainnya.edit', ['transaksi_lainnya' => $transaksi_lainnya->id]) }}">Edit</a>
                                        <form
                                            action="{{ route('transaksi_lainnya.destroy', ['transaksi_lainnya' => $transaksi_lainnya->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href=""
                                                for='btnSubmit-{{ $transaksi_lainnya->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $transaksi_lainnya->id }}'
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
    var locationHrefHapusSemua = "{{ url('transaksi_lainnya/hapus_semua') }}";
    var locationHrefCreate = "{{ url('transaksi_lainnya/create') }}";
    var columnOrders = [3];
    var urlSearch = "{{ url('transaksi_lainnya') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter...";
    var tampilkan_buttons = true;
    var button_manual = true;

    // khusus export
    var locationHrefExport = "{{ route('transaksi_lainnya.import_or_export') }}";
</script>
@endsection
