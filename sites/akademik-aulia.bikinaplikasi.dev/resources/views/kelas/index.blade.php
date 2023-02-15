@extends("layouts.admin-lte.app")

@section('page') Kelas @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Wali Kelas</th>
                        <th>Ketua Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Ruang</th>
                        @if(in_array(auth()->user()->level, ['tu']))
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelass as $kelas)
                    <tr data-id="{{ $kelas->id }}">
                        <td>{{ $loop->iteration }}
                        <td>{{ $kelas->wali_kelas()->nama ?? "" }}</td>
                        <td>{{ $kelas->ketua_kelas()->nama ?? "" }}</td>
                        <td>{{ $kelas->nama }}</td>
                        <td>{{ $kelas->ruang }}</td>
                        @if(in_array(auth()->user()->level, ['tu']))
                        <td class='text-center'>
                            <a class="label label-primary" href="{{ url(route('kelas.edit', ['kela' => $kelas->id])) }}">Edit</a>
                            <form action="{{ url(route('kelas.destroy', ['kela' => $kelas->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $kelas->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $kelas->id }}'
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
    var locationHrefHapusSemua = "{{ url('kelas/hapus_semua') }}";
    var locationHrefCreate = "{{ url('kelas/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('kelas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari kelas";


    @if(in_array(auth()->user()->level, ['tu']))
    var tampilkan_buttons = true;
    var button_manual = true;
    @else
    var tampilkan_buttons = false;
    var button_manual = false;
    @endif

    const locationHrefNaikKelas = "{{ url('user.naik_kelas') }}";
</script>
@endsection
