@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
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
                <a href="{{ url("posts/{$posts[0]->slug}") }} " class="text-decoration-none btn btn-primary">Read
                    more</a>

                @if(auth()->user())
                    @if(auth()->user()->is_admin)
                        <form action="{{ url("posts/{$posts[0]->slug}") }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure delete this post?')">Delete
                            </button>
                        </form>
                    @endif
                @endif

            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
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
                                    More</a>
                                @if(auth()->user())
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

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection


