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
                                    <li><span class="bread-blod">alternatif</span>
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
                                    <th>Alternatif Id</th>
                                    <th>Kriteria Detail Id</th>

                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif_detail as $item)

                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->alternatif->nama }}</td>
                                        <td>{{ $item->kriteria_detail->keterangan }}</td>

                                        <td class="text-center">

                                            <a class="badge badge-primary"
                                               href="{{ url('/alternatif-detail/' . $item->id . '/edit?alternatif_id=' . request()->alternatif_id) }}">Edit</a>

                                            <form action="{{ url('/alternatif-detail' . '/' . $item->id . '?alternatif_id=' . request()->alternatif_id) }}" method='post'
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
        const locationHrefHapusSemua = "{{ url('alternatif-detail/hapus_semua?alternatif_id=' . request('alternatif_id')) }}";
        const locationHrefAktifkanSemua = "{{ url('alternatif-detail/aktifkan_semua?alternatif_id=' . request('alternatif_id')) }}";
        const locationHrefCreate = "{{ url('alternatif-detail/create?alternatif_id=' . request('alternatif_id')) }}";
        var columnOrders = [{{ $alternatif_detail_count - 3 }}];
        var urlSearch = "{{ url('alternatif-detail?alternatif_id=' . request('alternatif_id')) }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
