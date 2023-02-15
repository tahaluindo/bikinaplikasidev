@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Materi</li>
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
                                    <th>Judul</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materis as $materi)
                                <tr data-id='{{ $materi->id }}'>
                                    <td>{{ $materi->judul }}</td>
                                    <td class="text-center">
                                        <a class="text-white label label-info" style='cursor: pointer;' data-toggle="modal" data-target="#detail-{{ $materi->id }}">
                                            Detail
                                        </a>
                                        @if(in_array(auth()->user()->level, ['admin', 'guru']))
                                        <a class="label label-primary" href="{{ url(route('materi.edit', ['materi' => $materi->id])) }}">Edit</a>
                                        <form action="{{ url(route('materi.destroy', ['materi' => $materi->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $materi->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $materi->id }}'
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

@foreach($materis as $materi)
<div class="modal fade" id="detail-{{ $materi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail {{ substr($materi->judul, 0, 25) }}...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul>
                    <li class="d-block">
                        <strong>List Kelas & Mata Pelajaran</strong>
                    </li>
                    @foreach($materi->mapel_detail_ids as $mapel_detail_id)
                    @php $mapel_detail = \App\MapelDetail::find($mapel_detail_id); @endphp
                    <li>{{ $mapel_detail->kelas->nama }} - {{ $mapel_detail->mapel->nama }}</li>
                    @endforeach
                </ul>

                <ul>
                    <li class="d-block">
                        <strong>List Files</strong>
                    </li>

                    @if(count($materi->files))                    
                    @foreach($materi->files ?? [] as $file)
                    <li>
                        <a href="{{ url($file) }}" download="{{ $file }}">{{ $file }}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    var locationHrefHapusSemua = "{{ url('materi/hapus_semua') }}";
    var locationHrefCreate = "{{ url('materi/create') }}";

    @if(in_array(auth()->user()->level, ['admin', 'guru']))
    var columnOrders = [0, 1];
    @else
    var columnOrders = [0];
    @endif

    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari materi";


    @if(in_array(auth()->user()->level, ['admin', 'guru']))
    var tampilkan_buttons = true;
    var button_manual = true;
    @else
    var tampilkan_buttons = false;
    var button_manual = false;
    @endif

</script>
@endsection
