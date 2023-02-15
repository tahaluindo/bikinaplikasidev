@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Kuis Detail</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th>Nama Kuis</th>
                                    <th>Nama</th>
                                    <th>Benar</th>
                                    <th>Salah</th>
                                    <th>Tidak Dijawab</th>
                                    <th>Total Soal</th>
                                    <th>Nilai</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($test_details as $test_detail)
                                <tr>
                                    <td>
                                        {{ $test_detail->test->nama }}
                                    </td>
                                    <td>{{ $test_detail->user->nama }}</td>
                                    <td>{{ $test_detail->benar }}</td>
                                    <td>{{ $test_detail->salah }}</td>
                                    <td>{{ $test_detail->tidak_dijawab }}</td>
                                    <td>{{ $test_detail->benar + $test_detail->salah + $test_detail->tidak_dijawab }}</td>
                                    <td>{{ $test_detail->nilai }}</td>
                                    <td>
                                        @if($test_detail->status != "Dibatalkan")
                                            @if(in_array(auth()->user()->level, ['admin', 'guru']))
                                        <a class="label label-danger" href="{{ url(route('test_detail.batalkan', ['test_detail' => $test_detail->id])) }}"
                                            onclick="return confirm('Yakin akan membatalkan test ini?')" >Batalkan</a>
                                            @endif
                                        @elseif($test_detail->status == "Dibatalkan")
                                        <a class="label label-secondary">Dibatalkan</a>
                                        @endif
                                        <a class="label label-info" href="{{ url(route('test_detail.show', ['test_detail' => $test_detail->id])) }}?test_id={{ $test_detail->test->id }}">Detail</a>
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
    var locationHrefHapusSemua = "{{ url('test_detail/hapus_semua') }}";
    var locationHrefCreate = "{{ url('test_detail/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari test";
    var tampilkan_buttons = false;
    var button_manual = false;
</script>
@endsection
