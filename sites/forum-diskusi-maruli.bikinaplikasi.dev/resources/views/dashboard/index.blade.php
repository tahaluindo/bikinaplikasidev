@extends('dashboard.layout.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome My Dear, {{ auth()->user()->name }}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12 bg-primary">
            <div class="white-box analytics-info">
                <h3 class="box-title text-white">Users</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash">
                            <canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-white"><h5>{{ $users->count() }}</h5></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 bg-success">
            <div class="white-box analytics-info">
                <h3 class="box-title text-white">Posts</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash2">
                            <canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span
                            class="counter text-purple text-white"><h5>{{ $posts->count() }}</h5></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 bg-warning">
            <div class="white-box analytics-info">
                <h3 class="box-title text-white">Kategori</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash3">
                            <canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span
                            class="counter text-info text-white"><h5>{{ $categories->count() }}</h5></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <h1 class="mb-3 text-center mt-5">6 Post Tervaforit</h1>

    <div class="row justify-content-center mb-3" style="text-align: center;">
        <div class="col-md-6">
            <form action="{{ url('posts') }}">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                           value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>

            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3 justify-content-center text-center">
            @if ($posts[0]->image)
                <div style="max-height:300px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="" srcset="{{ $posts[0]->category->name}}"
                         class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/900x300?{{ $posts[0]->category->name }}"
                     class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a href="{{ url("posts/{$posts[0]->slug}") }}"
                                          class="text-decoration-none"> {{ $posts[0]->title }}</a></h3>
                <p><small class="text-muted">

                        <small class="text-muted">
                            By. <a href="{{ url("posts?author={$posts[0]->author->username}") }}"
                                   class="text-decoration-none">
                                {{ $posts[0]->author->name }}</a>

                            in <a href="{{ url("posts?category={$posts[0]->category->slug}") }}"
                                  class="text-decoration-none">
                                {{ $posts[0]->category->name }} </a> {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="{{ url("posts/{$posts[0]->slug}") }} " class="text-decoration-none btn btn-primary">Read More
                    ({{ $posts[0]->komens_count }} Komentar)</a>

            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1)->take(6) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-1 py-1" style="background-color: rgba(0,0,0,0.6)">
                                <a href="{{ url("posts?category={$post->category->slug}") }}"
                                   class="text-white text-decoration-none"> {{ $post->category->name }}</a></div>

                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                     srcset="{{ $post->category->name}}" class="img-fluid">
                            @else
                                <img src="https://source.unsplash.com/400x300?{{ $post->category->name}}"
                                     class="card-img-top" alt="{{ $post->category->name }}">
                            @endif


                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                By. <a href="{{ url("posts?author={$post->author->username}") }}"
                                       class="text-decoration-none">{{ $post->author->name }}</a>

                                <p> in <a href="{{ url("posts?category={$post->category->slug}") }}"
                                          class="text-decoration-none">
                                        {{ $post->category->name }} </a></p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="{{ url("posts/$post->slug") }}" class="text-decoration-none btn btn-primary">Read
                                    More ({{ $post->komens_count }} Komentar)</a>

                                @if(auth()->user()->is_admin)
                                    <form action="{{ url("posts/{$post->slug}") }}" method="post"
                                          class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure delete this post?')">Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif


    <h1 class="mb-3 text-center mt-5">6 Kategori Terfavorit</h1>

    @if ($categories->count())

        <div class="container mb-5">
            <div class="row">
                @foreach ($categories as $category)

                    @if($category->name == 'Personal')
                        <div class="col-md-4 mt-4 ">
                            <a href="{{ url("posts?category=$category->slug") }}">
                                <div class="card bg-dark text-white">
                                    <img src="https://source.unsplash.com/400x300?{{ $category->name }}"
                                         class="card-img"
                                         alt="{{ $category->name }}">
                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                                            style="background-color: rgba(0,0,0,0.6)">{{ $category->name }}
                                            ({{ $posts->count() }} Post)</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-md-4 mt-4 ">
                            <a href="{{ url("posts?category=$category->slug") }}">
                                <div class="card bg-dark text-white">
                                    <img src="https://source.unsplash.com/400x300?{{ $category->name }}"
                                         class="card-img"
                                         alt="{{ $category->name }}">
                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                                            style="background-color: rgba(0,0,0,0.6)">{{ $category->name }}
                                            ({{ $category->posts_count }} Post)</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    @else
        <p class="text-center fs-4">No Category Found.</p>
    @endif

@endsection
