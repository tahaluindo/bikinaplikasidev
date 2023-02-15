@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tugas</li>
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
                                    <th>Nama</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Deskripsi</th>
                                    
                                    @if(auth()->user()->level == 'siswa')
                                    <th>Link</th>
                                    @endif
                                    
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tugass as $tugas)
                                <tr data-id='{{ $tugas->id }}'>
                                    <td>{{ $tugas->nama }}</td>
                                    <td>{{ $tugas->mapel->nama }}</td>
                                    <td>{{ $tugas->deskripsi }}</td>
                                    <td>
                                        @if(auth()->user()->level == 'siswa')
                                            @if($tugas->tugas_details->where('siswa_id', auth()->id())->first())
                                                <a href="{{ $tugas->tugas_details->where('siswa_id', auth()->id())->first()->link }}">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">
                                        @if(auth()->user()->level == "guru")
                                        <a class="label label-primary" href="{{ url(route('tugas.edit', $tugas->id)) }}">Edit</a>
                                        <form action="{{ url(route('tugas.destroy', ['tugas' => $tugas->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $tugas->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $tugas->id }}'
                                                style="display: none;"></button>
                                        </form>
                                        @endif

                                        @if(auth()->user()->level == "siswa")
                                            @if($tugas->tugas_details->where('tugas_id', $tugas->id)->where('user_id', auth()->user()->id)->count())
                                                @php
                                                $tugas_detail = $tugas->tugas_details->where('tugas_id', $tugas->id)->where('user_id', auth()->user()->id)->first();
                                                @endphp

                                                <a class="label label-success text-white">Sudah Kumpul</a>
                                                <a class="label label-warning" href="{{ url($tugas_detail->file) }}" download>Download</a>
                                            @else
                                                <a class="label label-primary" href="{{ url(route('tugas.kumpul', $tugas->id)) }}">Kumpul</a>
                                            @endif
                                        @else
                                            <a class="label label-primary" href="{{ url(route('tugas.show', $tugas->id)) }}">Detail</a>
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
    var locationHrefHapusSemua = "{{ url('tugas/hapus_semua') }}";
    var locationHrefCreate = "{{ url('tugas/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('tugas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari nama tugas";

    @if(auth()->user()->level == "guru")
    var tampilkan_buttons = true;
    var button_manual = false;
    @else
    var tampilkan_buttons = false;
    var button_manual = false;
    @endif

</script>
@endsection
