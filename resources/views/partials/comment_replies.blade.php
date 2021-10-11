@auth
@foreach($comments as $comment)
 
<div class="display-comment">
    <strong>{{ $comment->author->username }} <small class="text-muted"> in {{ $comment->created_at->diffForHumans() }}</small></strong>
    <p>{{ $comment->body }}</p>
    @if($comment->author->username == auth()->user()->username)
    <form action="/comment/delete/{{ $comment->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-outline-danger mb-2" onclick="return confirm('Are you sure?')"> 
          <span data-feather="x-circle"></span>
        Delete
        </button>
    </form>
    @endif
    
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group border-light">
            <input type="text" name="body" class="form-control" placeholder="Write your reply here..." required/>
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            <input type="submit" class="btn btn-info mt-3" value="Reply" />
        </div>
    </form>
    
    <hr class="solid">
    @include('partials.comment_replies', ['comments' => $comment->replies])
</div>
@endforeach

@else

@foreach($comments as $comment)
 
<div class="display-comment">
    <strong>{{ $comment->author->username }} <small class="text-muted"> in {{ $comment->created_at->diffForHumans() }}</small></strong>
    <p>{{ $comment->body }}</p>
    
    
    
    <a href="" id="reply"></a>
    <form>
        @csrf
        <div class="form-group border-light">
            <input type="text" name="body" class="form-control" placeholder="Please login to reply a comment" disabled/>
        </div>
    </form>
    
    <hr class="solid">
    @include('partials.comment_replies', ['comments' => $comment->replies])
</div>
@endforeach

@endauth
