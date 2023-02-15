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
                                    <li><span class="bread-blod">User</span>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
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

                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->level ? $item->level : "" }}</td>

                                        @if(auth()->user()->level == 'Admin')
                                            <td class="text-center">
                                                <a class="badge badge-primary"
                                                   href="{{ url('/user/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/user' . '/' . $item->id) }}"
                                                      method='post' style='display: inline;'
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
        var tampilkan_buttons = false;
        var button_manual = false;
        @else
        var tampilkan_buttons = false;
        var button_manual = false;
        @endif
    </script>
@endsection
