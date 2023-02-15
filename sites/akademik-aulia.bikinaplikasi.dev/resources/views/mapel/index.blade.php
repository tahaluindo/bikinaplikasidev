@extends("layouts.admin-lte.app")

@section('page') Mapel @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Nama</th>
                        <th>Kelompok</th>
                        <th>KKM</th>

                        @if(in_array(auth()->user()->level, ['tu']))
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($mapels as $mapel)
                    <tr data-id='{{ $mapel->id }}'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mapel->nama }}</td>
                        <td>{{ $mapel->kelompok }}</td>
                        <td>{{ $mapel->kkm }}</td>
                        @if(in_array(auth()->user()->level, ['tu']))
                        <td class="text-center">
                            <a class="label label-primary" href="{{ url(route('mapel.edit', ['mapel' => $mapel->id])) }}">Edit</a>
                            <form action="{{ url(route('mapel.destroy', ['mapel' => $mapel->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $mapel->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $mapel->id }}'
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
    var locationHrefHapusSemua = "{{ url('mapel/hapus_semua') }}";
    var locationHrefCreate = "{{ url('mapel/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('mapel') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari mapel...";

    @if(in_array(auth()->user()->level, ['tu']))
    var tampilkan_buttons = true;
    @else
    var tampilkan_buttons = false;
    @endif

    var button_manual = true;

</script>
@endsection
