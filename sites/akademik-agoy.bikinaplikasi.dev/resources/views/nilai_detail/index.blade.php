@extends("layouts.admin-lte.app")

@section('page') Nilai Detail @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Tugas</th>
                        <th>Ulangan Harian</th>
                        <th>Mid Semester</th>
                        <th>Uas</th>
                        <th>Rata Rata Pengetahuan</th>
                        <th>Predikat Pengetahuan</th>
                        <th>Keterampilan</th>
                        <th>Predikat Keterampilan</th>
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
                        <td>{{ $nilai_detail->tugas }}</td>
                        <td>{{ $nilai_detail->ulangan_harian }}</td>
                        <td>{{ $nilai_detail->mid_semester }}</td>
                        <td>{{ $nilai_detail->uas }}</td>
                        <td>{{ $nilai_detail->rata_rata_pengetahuan }}</td>
                        <td>{{ $nilai_detail->predikat_pengetahuan }}</td>
                        <td>{{ $nilai_detail->keterampilan }}</td>
                        <td>{{ $nilai_detail->predikat_keterampilan }}</td>

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

<script>
    const locationHrefHapusSemua = "{{ url('nilai_detail/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('nilai_detail/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('nilai_detail/create') }}?nilai_id={{ request()->nilai_id }}";
    var columnOrders = [6];
    var urlSearch = "{{ url('nilai_detail') }}?nilai_id={{ request()->nilai_id }}";
    var q = "@if(request()->q) {{ request()->q  }}?nilai_id={{ request()->nilai_id }} @endif";
    var placeholder = "Filter...";

    @if(in_array(auth()->user()->level, ['guru']))
    var tampilkan_buttons = true;
    @else
    var tampilkan_buttons = false;
    @endif

    var button_manual = true;
</script>
@endsection