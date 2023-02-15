<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url("posts") }}">UNAMA Forum</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <div class="nav-item dropdown" style="display: inline-block;">

                <a href="#" class="nav-link dropdown-toggle"
                   data-bs-toggle="dropdown">{{ $notifikasi->where('ke_user_id', auth()->id())->where('dibaca', 0)->sortByDesc('created_at')->count() }}
                    Notifikasi</a>
                <div class="dropdown-menu dropdown-menu-end" style="position: absolute">
                    @foreach($notifikasi->where('ke_user_id', auth()->id())->where('dibaca', 0)->sortByDesc('created_at') as $item)
                        @php
                            $item->post->title = \Illuminate\Support\Str::limit($item->post->title, 10);
                        @endphp

                        <a href="{{ url("posts/" . $item->post->slug . "?notifikasi_id=$item->id") }}"
                           class="dropdown-item">
                            {{$item->type == 'Balasan' ? "Balasan dari {$item->dari_user->name} untuk {$item->post->title}" : "Komentar dari {$item->dari_user->name} untuk {$item->post->title}"}}

                            <span class="text-muted">{{ $item->created_at->diffForHumans() }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <form action="{{ url('logout') }}" method="post" style="display: inline;">
                @csrf
                <a class="nav-link px-3 bg-primary border-0" style="display: inline-block" href="{{ url('dashboard/user/profile') }}"> Profile
                    <span
                        data-feather="user"></span></a>

                <button type="submit" class="nav-link px-3 bg-primary border-0" style="display: inline-block"> Logout
                    <span
                        data-feather="log-out"></span></button>
            </form>
        </div>
    </div>
</header>
