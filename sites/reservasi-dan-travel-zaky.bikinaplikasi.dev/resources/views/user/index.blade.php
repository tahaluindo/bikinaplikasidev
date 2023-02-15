@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <h3 class="mb-0">{{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>
                    <div class="mb-3"></div>
                    <table class="table" id='dataTable'>
                        <thead>
                        <tr>
                            <th width=2>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Level</th>
                            <th>Foto</th>
                            <th>Dokumen Penting</th>
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

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->level ? $item->level : "" }}</td>
                                <td>
                                    @if($item->foto)
                                        <a href="{{ url($item->foto) }}">
                                            <img src="{{ url($item->foto) }}" width="100">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($item->dokumen_penting)
                                        <a href="{{ url($item->dokumen_penting) }}">Lihat</a>
                                    @endif
                                </td>

                                @if(auth()->user()->level == 'Admin')
                                    <td class="text-center">
                                        @if($item->level != 'Admin')
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
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

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
                </div>
            </div>
        </div>
    </div>
@endsection
