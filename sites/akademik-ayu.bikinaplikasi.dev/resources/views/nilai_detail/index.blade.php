@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-sm-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Nilai Detail ({{ $nilai->mapel_detail->mapel->nama }})</li>
            </ol>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                
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
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Angka Kl 3</th>
                                    <th>Predikat Kl 3</th>
                                    <th>Angka Kl 4</th>
                                    <th>Predikat Kl 4</th>
                                    <th>Dalam Mapel Kl 1 Kl 2</th>
                                    {{-- <th>
                                        Antar Mapel Kl 1 Kl 2
                                    </th> --}}
                                    @if(in_array(auth()->user()->level, ['guru']))
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai_details as $nilai_detail)
                                <tr data-id='{{ $nilai_detail->id }}'>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nilai_detail->user->nama }}</td>
                                    <td>{{ $nilai_detail->angka_kl_3 }}</td>
                                    <td>{{ $nilai_detail->predikat_kl_3 }}</td>
                                    <td>{{ $nilai_detail->angka_kl_4 }}</td>
                                    <td>{{ $nilai_detail->predikat_kl_4 }}</td>
                                    <td>{{ $nilai_detail->dalam_mapel_kl_1_kl_2 }}</td>
                                    {{-- <td>{{ $nilai_detail->antar_mapel_kl_1_kl_2 }}</td> --}}
                                    
                                    @if(in_array(auth()->user()->level, ['guru']))
                                    <td class="text-center">
                                        <a class="label label-primary" href="{{ url(route('nilai_detail.edit', ['nilai_detail' => $nilai_detail->id])) }}?nilai_id={{ $nilai_detail->nilai_id }}">Edit</a>
                                        <form action="{{ url(route('nilai_detail.destroy', ['nilai_detail' => $nilai_detail->id])) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf

                                            <input type="hidden" name="nilai_id" value='{{ $nilai_detail->nilai_id }}'>

                                            <label class="label label-danger" href="" for='btnSubmit-{{ $nilai_detail->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $nilai_detail->id }}'
                                                style="display: none;"></button>
                                        </form>
                                    </td>
                                    @endif
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
    const locationHrefHapusSemua = "{{ url('nilai_detail/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('nilai_detail/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('nilai_detail/create') }}?nilai_id={{ request()->nilai_id }}";
    var columnOrders = [7];
    var urlSearch = "{{ url('nilai_detail') }}";
    // var urlSearch = "{{ url('nilai_detail') }}?nilai_id={{ request()->nilai_id }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    // var q = "{{ $_GET['q'] ?? '' }}?nilai_id={{ request()->nilai_id }}";
    var placeholder = "Filter...";

    @if(in_array(auth()->user()->level, ['guru']))
    var tampilkan_buttons = true;
    @else
    var tampilkan_buttons = false;
    @endif
    
    var button_manual = true;
</script>
@endsection