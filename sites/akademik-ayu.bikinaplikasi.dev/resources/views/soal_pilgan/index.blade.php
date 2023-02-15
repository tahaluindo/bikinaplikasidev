@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Soal Pilgan</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                <a href="{{ url(route('soal_pilgan.import')) }}" class="btn pull-right hidden-sm-down bg-light"> Import</a>
                <a href="{{ url(route('soal_pilgan.download_format')) }}" class="btn pull-right hidden-sm-down bg-light"> Download Format</a>
                <a href="{{ url(route('soal_pilgan.export')) }}" class="btn pull-right hidden-sm-down bg-light"> Export</a>
            </div>
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
                                    <th width='5'>No</th>
                                    <th>Mapel</th>
                                    <th>Soal</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Opsi D</th>
                                    <th>Jawaban</th>
                                    <th>Jenis</th>
                                    <th>Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($soal_pilgans as $soal_pilgan)
                                <tr data-id="{{ $soal_pilgan->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $soal_pilgan->mapel->nama }}</td>
                                    <td>{!! substr($soal_pilgan->soal, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->opsi_a, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->opsi_b, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->opsi_c, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->opsi_d, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->jawaban, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->jenis, 0, 10) !!}..</td>
                                    <td>{!! substr($soal_pilgan->gambar, 0, 10) !!}..</td>
                                    <td>
                                        <a class="label label-primary" href="{{ url(route('soal_pilgan.edit', ['soal_pilgan' => $soal_pilgan->id])) }}">Edit</a>
                                        <form action="{{ url(route('soal_pilgan.destroy', ['soal_pilgan' => $soal_pilgan->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $soal_pilgan->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $soal_pilgan->id }}'
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
    var locationHrefHapusSemua = "{{ url('soal_pilgan/hapus_semua') }}";
    var locationHrefCreate = "{{ url('soal_pilgan/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari soal";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection
