@extends('dashboard.layout.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="{{url('/dashboard/categories/' . $category->slug)}}" class="mb-5"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Category</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       required autofocus value="{{  old('name') == "" ? $category->name : old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>

    <script>
        const category = document.querySelector('#name');
        fetch('/dashboard/posts/checkSlug?category=' + category.value);

        category.addEventListener('change', function () {
        .then(response => response.json())
                .then(data => category.value = data.category)
        });

    </script>
@endsection
