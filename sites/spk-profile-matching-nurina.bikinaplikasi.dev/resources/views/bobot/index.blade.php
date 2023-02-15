@extends("layouts.admin-lte.app")

@section('page') Bobot @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Selisih</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bobots as $bobot)
                    <tr data-id="{{ $bobot->id }}">
                        <td>{{ $loop->iteration }}
                        <td>{{ $bobot->selisih }}</td>
                        <td>{{ $bobot->nilai }}</td>
                        <td>{{ $bobot->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var locationHrefHapusSemua = "{{ url('bobot/hapus_semua') }}";
    var locationHrefCreate = "{{ url('bobot/create') }}";
    var columnOrders = [3];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari bobot";
    var tampilkan_buttons = false;
    var button_manual = true;

</script>
@endsection
