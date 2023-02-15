@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Soal Essay</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                <a href="{{ url('soal_essay/import') }}" class="btn pull-right hidden-sm-down bg-light">
                    Import</a>
                <a href="{{ url('soal_essay/download_format') }}" class="btn pull-right hidden-sm-down bg-light">
                    Download Format</a>
                <a href="{{ url('soal_essay/export') }}" class="btn pull-right hidden-sm-down bg-light">
                    Export</a>
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
                                    <th>Gambar</th>
                                    <th>Jenis</th>
                                    <th>Bobot</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($soal_essays as $soal_essay)
                                <tr data-id='{{ $soal_essay->id }}'>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $soal_essay->mapel->nama }}</td>
                                    <td>{!! substr($soal_essay->soal, 0, 25) !!}...</td>
                                    <td>
                                        <img class="img" src="{{ $soal_essay->gambar }}" width="50" height="50">
                                    </td>
                                    <td>{{ $soal_essay->jenis }}</td>
                                    <td>{{ $soal_essay->bobot }}</td>
                                    <td>
                                        <a class="label label-primary" href="{{ url(route('soal_essay.edit', ['soal_essay' => $soal_essay->id])) }}">Edit</a>
                                        <form action="{{ url(route('soal_essay.destroy', ['soal_essay' => $soal_essay->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $soal_essay->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $soal_essay->id }}'
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
    var locationHrefHapusSemua = "{{ url('soal_essay/hapus_semua') }}";
    var locationHrefCreate = "{{ url('soal_essay/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari soal";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
