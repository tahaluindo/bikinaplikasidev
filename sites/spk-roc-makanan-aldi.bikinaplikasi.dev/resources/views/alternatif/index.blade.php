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
                    <div class="product-sales-chart" class="table-responsive">
                        <div style="padding: 20px !important;">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Comunale</th>
                                    <th>Genre</th>
                                    <th>Nama</th>
                                    <th>Ig</th>
                                    @foreach ($kriteria->sortBy('urutan_prioritas') as $item)
                                    <th>{{ $item->nama }}</th> 
                                    @endforeach
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->comunale->kode }}</td>
                                        <td>{{ $item->genre->nama }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->instagram }}</td>
                                        @foreach ($item->alternatif_details->sortBy('kriteria_detail.kriteria.urutan_prioritas') as $itemAlternatifDetail)
                                        <td>{{ $itemAlternatifDetail->kriteria_detail->keterangan }} ({{ $itemAlternatifDetail->kriteria_detail->nilai_bobot }})</td>
                                        @endforeach
                                        
                                        <td class="text-center">
                                            <a class="badge badge-primary"
                                               href="{{ url('/alternatif/' . $item->id . '/edit') }}">Edit</a>

                                            <form action="{{ url('/alternatif' . '/' . $item->id) }}" method='post'
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
        const locationHrefHapusSemua = "{{ url('alternatif/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('alternatif/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('alternatif/create') }}";
        var columnOrders = [{{ $alternatif_count - 5 }}];
        var urlSearch = "{{ url('alternatif') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection




