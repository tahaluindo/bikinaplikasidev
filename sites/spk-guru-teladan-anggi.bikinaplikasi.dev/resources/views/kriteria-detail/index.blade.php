@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Kriteria Detail</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Keterangan</th>
                                    <th>nilai</th>

                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kriteria_detail->sortByDesc('nilai')->values() as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->nilai }}</td>

                                        <td class="text-center">

                                            <a class="badge badge-primary"
                                               href="{{ url('/kriteria-detail/' . $item->id . '/edit?kriteria_id=' . request()->kriteria_id ) }}">Edit</a>

                                            <form action="{{ url('/kriteria-detail' . '/' . $item->id . "?kriteria_id=" . request()->kriteria_id ) }}" method='post'
                                                  style='display: inline;'
                                                  onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                @method('DELETE')
                                                @csrf
                                                <label class="badge badge-danger" href=""
                                                       for='btnSubmit-{{ $item->id }}'
                                                       style='cursor: pointer;'>Hapus</label>
                                                <button type="submit" id='btnSubmit-{{ $item->id }}'
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
        const locationHrefHapusSemua = "{{ url('kriteria-detail/hapus_semua?kriteria_id=' . request()->kriteria_id) }}";
        const locationHrefAktifkanSemua = "{{ url('kriteria-detail/aktifkan_semua?kriteria_id=' . request()->kriteria_id) }}";
        const locationHrefCreate = "{{ url('kriteria-detail/create?kriteria_id=' . request()->kriteria_id) }}";
        var columnOrders = [{{ $kriteria_detail_count - 3 }}];
        var urlSearch = "{{ url('kriteria-detail?kriteria_id=' . request()->kriteria_id) }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
