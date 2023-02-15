@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Santri Detail ({{ $pembayaranSantri->keterangan }})</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran Santri Detail</li>
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
                    <div class="card-body table-responsive">
                        <table class="table table-sm" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=5>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Bulan</th>
                                    <th>SPP</th>
                                    <th>Uang Makan</th>
                                    <th>Belum Dibayar</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Potongan</th>
                                    <th>Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran_santri_details as $pembayaran_santri_detail)
                                <tr data-id="{{ $pembayaran_santri_detail->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran_santri_detail.index', $pembayaran_santri_detail->pembayaran_santri->id) }}?q={{ $pembayaran_santri_detail->user->nama }}">
                                            {{ $pembayaran_santri_detail->user->nama }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $pembayaran_santri_detail->user->kelas->nama }}</td>
                                    <td>{{ $pembayaran_santri_detail->pembayaran_santri_bulan->nama }}</td>
                                    <td>{{ toIdr($pembayaran_santri_detail->nominal_spp_dibayar / (100 - $pembayaran_santri_detail->potongan) * 100) }}</td>
                                    <td>{{ toIdr($pembayaran_santri_detail->nominal_uang_makan_dibayar) }}</td>
                                    @if($pembayaran_santri_detail->nominal_belum_dibayar < 0)
                                    <td><b>-</b>{{ toIdr(abs($pembayaran_santri_detail->nominal_belum_dibayar)) }}</td>
                                    @else
                                    <td>{{ toIdr($pembayaran_santri_detail->nominal_belum_dibayar) }}</td>
                                    @endif
                                    <td>{{ $pembayaran_santri_detail->status }}</td>
                                    <td>{{ $pembayaran_santri_detail->tanggal_bayar }}</td>
                                    <td>{{ $pembayaran_santri_detail->potongan }}%</td>

                                    @if($pembayaran_santri_detail->nominal_belum_dibayar < 0)
                                    <td>{{ toIdr($pembayaran_santri_detail->nominal_spp_dibayar +  $pembayaran_santri_detail->nominal_uang_makan_dibayar) }}</td>
                                    @else
                                    <td>{{ toIdr($pembayaran_santri_detail->nominal_spp_dibayar +  $pembayaran_santri_detail->nominal_uang_makan_dibayar - $pembayaran_santri_detail->nominal_belum_dibayar) }}</td>
                                    @endif

                                    <td class='text-center'>
                                        <label class="badge badge-info" data-toggle="popover"
                                            data-content="Dibuat: {{ $pembayaran_santri_detail->created_at }} <br> Diupdate: {{ $pembayaran_santri_detail->updated_at }}"
                                            data-placement="top"
                                            data-title='{{ $pembayaranSantri->keterangan }}'>Detail</label>

                                            @if($pembayaran_santri_detail->nominal_belum_dibayar > 0)
                                            <a class="badge badge-warning"
                                            href="{{ route('pembayaran_santri_detail.lunaskan', ['pembayaran_santri' => $pembayaranSantri->id, 'pembayaran_santri_detail' => $pembayaran_santri_detail->id]) }}">Lunaskan</a>
                                            @endif

                                        @if(auth()->user()->level == 'superadmin')
                                        <a class="badge badge-primary"
                                            href="{{ route('pembayaran_santri_detail.edit', ['pembayaran_santri' => $pembayaranSantri->id, 'pembayaran_santri_detail' => $pembayaran_santri_detail->id]) }}">Edit</a>
                                        <form
                                            action="{{ route('pembayaran_santri_detail.destroy', ['pembayaran_santri' => $pembayaranSantri->id, 'pembayaran_santri_detail' => $pembayaran_santri_detail->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger mt-2" href=""
                                                for='btnSubmit-{{ $pembayaran_santri_detail->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $pembayaran_santri_detail->id }}'
                                                style="display: none;"></button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                                @if(request()->q)
                                <tr>
                                    <td colspan="4" class='text-center'>
                                        <strong>Total</strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ toIdr($pembayaran_santri_details->sum('nominal_spp_dibayar')) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ toIdr($pembayaran_santri_details->sum('nominal_uang_makan_dibayar')) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ toIdr($pembayaran_santri_details->sum('nominal_belum_dibayar')) }}
                                        </strong>
                                    </td>
                                    <td colspan='3'></td>
                                    <td>
                                        <strong>
                                            {{ toIdr($pembayaran_santri_details->sum('nominal_spp_dibayar') + $pembayaran_santri_details->sum('nominal_uang_makan_dibayar')) }}
                                        </strong>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var locationHrefHapusSemua = "{{ url('pembayaran_santri_detail/hapus_semua') }}";
    var locationHrefCreate = "{{ route('pembayaran_santri_detail.create', $pembayaranSantri->id) }}";
    var columnOrders = [5];
    var urlSearch = "{{ route('pembayaran_santri_detail.index', $pembayaranSantri->id) }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter data...";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
