@extends('layouts.app')

@section('content')

    <div id="content" class="app-content">
        <h1 class="page-header mb-3">
            User
        </h1>

        <div class="row">
            <div class="col-xl-12">
                <div class="card text-white-transparent-7 mb-3 overflow-hidden">
                    <div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>
                    <div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
                        <div class="row">
                            <div class="col-md-8 col-xl-6"></div>
                            <div class="col-md-4 col-xl-6 mb-n2">

                            </div>
                        </div>
                    </div>

                    <div class="card-body position-relative">

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
                            var tampilkan_buttons = true;
                            var button_manual = true;
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection