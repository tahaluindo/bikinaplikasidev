@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Informasi</li>
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
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Dibuat</th>
                                    <th>Diupdate</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($informasis as $informasi)
                                <tr data-id="{{ $informasi->id }}">
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#foto-{{ $informasi->id }}">Lihat</a>
                                    </td>
                                    <td>{{ $informasi->judul }}</td>
                                    <td>{!! $informasi->deskripsi !!}</td>
                                    <td>{{ $informasi->created_at }}</td>
                                    <td>{{ $informasi->updated_at }}</td>
                                    <td>
                                        <a class="label label-primary" href="{{ url(route('informasi.edit', ['informasi' => $informasi->id])) }}">Edit</a>
                                        <form action="{{ url(route('informasi.destroy', ['informasi' => $informasi->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $informasi->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $informasi->id }}'
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

@foreach($informasis as $informasi)
@php $fotos = json_decode($informasi->foto); @endphp
<div class="modal fade" id="foto-{{ $informasi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close ml-auto" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="carouselExampleIndicators" class="carousel slide"
                    data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($fotos ?? [] as $index => $foto)
                        <li data-target="#carouselExampleIndicators"
                            data-slide-to="{{ $index }}" class="@if($index == 0 ) active @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($fotos  ?? [] as $index => $foto)
                        <div class="carousel-item @if($index ==0 ) active @endif">
                            <img class="d-block w-100" src="{{ url($foto) }}"
                                alt="{{ $index }} slide">
                        </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev"
                        href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon"
                            aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next"
                        href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon"
                            aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    var locationHrefHapusSemua = "{{ url('informasi/hapus_semua') }}";
    var locationHrefCreate = "{{ url('informasi/create') }}";
    var columnOrders = [0, 5];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari judul...";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
