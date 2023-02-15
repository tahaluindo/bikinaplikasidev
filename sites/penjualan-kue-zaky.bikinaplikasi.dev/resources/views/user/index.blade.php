@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">User</a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        User
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    @if(session()->has("error"))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get("error") }}
                        </div>
                    @elseif(session()->has("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get("success") }}
                        </div>
                    @elseif(session()->has("warning"))
                        <div class="alert alert-warning" role="alert">
                            {{ session()->get("warning") }}
                        </div>
                    @endif

                    <div class="activity-table table-responsive recent-table">
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
                                        @if(!in_array($item->level, ['Admin', 'Pemilik']))
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
                    </div>

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
@endsection
