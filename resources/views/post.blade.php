@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 border-start border-end">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <p>By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
                in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }} </a>
            </p>

            @if ($post->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>   
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            
            
            <a href="/posts" class="d-block mt-3">Back to Posts</a>
            @auth
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
            <div class="mt-3 mb-3">
                <label for="comment" class="form-label"><h3>Add Comment:</h3></label>
               <input type="text" name="body" class="form-control" placeholder="Write your comment here..." required/>
               <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary mt-3">Add comment</button>
            </div>
            </form>

            @else

            <form>
                @csrf
            <div class="mt-3 mb-3">
                <label for="comment" class="form-label"><h3>Add Comment:</h3></label>
               <input type="text" name="body" class="form-control" placeholder="Please login to write a comment! " disabled/>
            </div>
            </form>

            @endauth

            <div class="mt-3 mb-3">
                <label for="comments" class="form-label"><h3>Comments ({{ $result  }}) : </h3></label>
                @include('partials.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
        </div>
    </div>
</div>
    
@endsection
