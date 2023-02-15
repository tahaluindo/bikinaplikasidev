@extends('dashboard.layout.main')

@section('container')
      <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                 <h1 class="mb-3">{{ $post->title }}</h1>

               <a href="{{ url('dashboard/posts') }}" class="btn btn-success"><span data-feather="arrow-left"></span> Back To My Posts</a>
               <a href="{{ url("dashboard/posts/$post->slug") }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                 <button class="btn btn-danger " onclick="return confirm('Are you sure delete this post?')"><span data-feather="x">Delete</span></button>
                </form>

                @if ($post->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" srcset="{{ $post->category->name}}" class="img-fluid mt-3">
                    </div>
                    @else
                        <img src="https://source.unsplash.com/900x300?{{ $post->category->name}}" alt="" srcset="{{ $post->category->name}}" class="img-fluid mt-3">
                    @endif

                <article class="my-2 fs-6">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>


@endsection
