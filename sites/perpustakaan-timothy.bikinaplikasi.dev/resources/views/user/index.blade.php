@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Name</th><th>Email</th>
                                    @if(auth()->user()->level == 'Admin')
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->name }}</td><td>{{ $item->email }}</td>

                                    @if(auth()->user()->level == 'Admin')
                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url('/user/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/user' . '/' . $item->id) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $item->id }}'
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
    const locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('user/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('user/create') }}";

    @if(auth()->user()->level == 'Admin')
    var columnOrders = [{{ $user_count - 2 }}];
    @else
    var columnOrders = [{{ $user_count - 3 }}];
    @endif

    var urlSearch = "{{ url('user') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";

    @if(auth()->user()->level == 'Admin')
    var tampilkan_buttons = true;
    var button_manual = true;
    @else
    var tampilkan_buttons = false;
    var button_manual = false;
    @endif
</script>
@endsection
