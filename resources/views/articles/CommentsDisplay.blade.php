
    @foreach($comments as $comment)
        <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <strong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->body }}</p>
            <a href="" id="reply"></a>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="body" class="form-control" />
                    <input type="hidden" name="article_id" value="" />
                    <input type="hidden" name="parent_id" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply" />
                </div>
            </form>
            @include('articles.CommentsDisplay', ['comments' => $comment->replies])
        </div>
    @endforeach

