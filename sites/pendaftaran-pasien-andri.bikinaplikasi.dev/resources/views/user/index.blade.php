@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border-no" id='dataTable'>
                                <thead>
                                <tr>
                                    <th class="border" width=2>#</th>
                                    <th class="border">Name</th>
                                    <th class="border">Email</th>
                                    <th class="border">Level</th>
                                    <th class="border text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td class="border">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="border">{{ $item->name }}</td>
                                        <td class="border">{{ $item->email }}</td>
                                        <td class="border">{{ $item->level }}</td>

                                        <td class="border text-center">
                                            @if($item->level != 'Admin')
                                                <a class="label label-primary"
                                                   href="{{ url('/user/' . $item->id . '/edit') }}"
                                                   style="display: inline-block; padding: 8px;">Edit</a>
                                                <form action="{{ url('/user' . '/' . $item->id) }}"
                                                      method='post'
                                                      style='display: inline;'
                                                      onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <label class="label label-danger" href=""
                                                           for='btnSubmit-{{ $item->id }}'
                                                           style='cursor: pointer; display: inline-block; padding: 8px;'>Hapus</label>
                                                    <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                            style="display: none;"></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <script>
                                const locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
                                const locationHrefAktifkanSemua = "{{ url('user/aktifkan_semua') }}";
                                const locationHrefCreate = "{{ url('user/create') }}";
                                var columnOrders = [0];
                                var urlSearch = "{{ url('user') }}";
                                var q = "{{ $_GET['q'] ?? '' }}";
                                var placeholder = "Filter...";
                                var tampilkan_buttons = false;
                                var button_manual = false;
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
