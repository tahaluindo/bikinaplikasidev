@extends('layouts.main')

@section('container')

    <div class="container  mb-3"  style="border: 1px solid grey;">
        <div class="row justify-content-center mb-3">
            <div class="col-md-10 md-offset-1">
                <h1 class="mb-3 mt-3">{{ $post->title }}</h1>

                By. <a href="{{ url("posts?author={$post->author->username}") }}"
                       class="text-decoration-none">{{ $post->author->name }}</a>

                <p> In <a href="{{ url("posts?category={$post->category->slug}") }}" class="text-decoration-none">
                        {{ $post->category->name }} </a></p>

                <p> Komentar: {{ $post->komens->count() }} Komentar</p>

                @if ($post->image)
                    <div style="max-width:300px;" class="mb-3">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" srcset="{{ $post->category->name}}"
                             class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/900x300?{{ $post->category->name}}" alt=""
                         srcset="{{ $post->category->name}}" class="img-fluid">
                @endif

                <article class="fs-6 text-justify">
                    {!! $post->body !!}
                </article>


                <a href="{{ url('posts') }}" class="btn btn-outline-success mt-2"><span data-feather="arrow-left"></span> Back To All Posts</a>
            </div>
        </div>
    </div>

    @if ('disqus')
        @auth
            @include('disqus.index')
        @endauth
    @endif

    @if ('disqus')
        @guest
            <h5 class=" text-center bg-warning text-white">You don't have any permission to see or create comment,
                please <a href="{{ url('') }}">Login</a></h5>
        @endguest
    @endif

@endsection

