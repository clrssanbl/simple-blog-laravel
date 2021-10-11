@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="mb-5" >
      @method('put')  
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}">
          <div class="invalid-feedback">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
          <div class="invalid-feedback">
            @error('slug')
            {{ $message }}
            @enderror
        </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?name='+ name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

</script>

@endsection
