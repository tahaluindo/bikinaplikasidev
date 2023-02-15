@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Kuis</li>
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
                                    <th>Jumlah Soal</th>
                                    <th>Jumlah Menit</th>
                                    <th>Jenis Soal</th>
                                    <th>Mode</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tests as $test)
                                @php $test_details = $test->test_details->where('user_id', auth()->user()->id) @endphp

                                <tr data-id="{{ $test->id }}">
                                    <td>
                                        <a href="{{ route('test_detail.index') }}?test_id={{ $test->id }}">
                                            {{ $test->nama }}
                                        </a>
                                    </td>
                                    <td>{{ $test->jumlah_soal }}</td>
                                    <td>{{ $test->jumlah_menit }}</td>
                                    <td>{{ $test->jenis_soal }}</td>
                                    <td>{{ $test->mode }}</td>
                                    <td>{{ $test->tanggal_mulai }}</td>
                                    <td>{{ $test->tanggal_selesai }}</td>
                                    <td>
                                        @if(in_array(auth()->user()->level, ['admin', 'siswa']))
                                            @if($test->tanggal_selesai < date('Y-m-d H:i:s'))
                                            <a class="text-dark label label-dark" style='cursor: pointer;'>
                                                Berakhir
                                            </a>
                                            @elseif(!count($test_details) && !$test_details->first() && $test->tanggal_mulai)

                                                @if($test->tanggal_mulai > date('Y-m-d H:i:s'))
                                                <a class="text-white label label-info" style='cursor: pointer;'>
                                                    Belum Mulai
                                                </a>
                                                @else
                                                <a href="{{ url(route('test.show', ['test' => $test->id])) }}" class="text-white label label-success" style='cursor: pointer;' onclick="return confirm('Yakin akan mengerjakan?')">
                                                    Kerjakan
                                                </a>
                                                @endif
                                            @elseif($test_details->first()->sisa_waktu == 0 && $test->jumlah_soal != count($test_details->first()->list_tests))
                                            <a class="text-white label label-warning" style='cursor: pointer;'>
                                                Timeout
                                            </a>
                                            @elseif($test_details->first()->status == "Belum Selesai")
                                            <a href="{{ url(route('test.show', ['test' => $test->id])) }}" class="text-white label label-warning" style='cursor: pointer;' onclick="return confirm('Yakin akan melanjutkan?')">
                                                Lanjutkan
                                            </a>
                                            @else
                                            <a class="text-white label label-inverse" style='cursor: pointer;'>
                                                Selesai
                                            </a>
                                            @endif
                                        @endif

                                        <a class="text-white label label-info" style='cursor: pointer;'
                                            data-toggle="modal" data-target="#detail-{{ $test->id }}">
                                            Detail
                                        </a>

                                        @if(in_array(auth()->user()->level, ['admin', 'guru']))
                                        <a class="label label-primary"
                                            href="{{ url(route('test.edit', ['test' => $test->id])) }}">Edit</a>
                                        <form action="{{ url(route('test.destroy', ['test' => $test->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $test->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $test->id }}'
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

@foreach($tests as $test)
<div class="modal fade" id="detail-{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail {{ substr($test->nama, 0, 25) }}...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <li class="d-block">
                    <strong>List Kelas & Mata Pelajaran</strong>
                </li>
                @foreach($test->mapel_detail_ids ?? [] as $mapel_detail_id)
                @php $mapel_detail = \App\MapelDetail::find($mapel_detail_id); @endphp
                <li>{{ $mapel_detail->kelas->nama }} - {{ $mapel_detail->mapel->nama }}</li>
                @endforeach

                <table>
                    <tbody>
                        <tr>
                            <th>Guru</th>
                            <td width='3'>:</td>
                            <td>{{ $test->guru()->nama }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td width='3'>:</td>
                            <td>{{ $test->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Diupdate Pada</th>
                            <td width='3'>:</td>
                            <td>{{ $test->updated_at }}</td>
                        </tr>
                        @if(auth()->user()->level == 'siswa')
                        <tr>
                            <th>Waktu Tersisa</th>
                            <td width='3'>:</td>
                            @if($test->test_detail)
                            <td>{{ $test->test_detail->sisa_waktu }} Menit</td>
                            @else
                            <td>- Menit</td>
                            @endif
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    var locationHrefHapusSemua = "{{ url('test/hapus_semua') }}";
    var locationHrefCreate = "{{ url('test/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari kuis";

    @if(in_array(auth()->user()->level, ['admin', 'guru']))
    var tampilkan_buttons = true;
    var button_manual = true;
    @else
    var tampilkan_buttons = false;
    var button_manual = false;
    @endif

</script>
@endsection
