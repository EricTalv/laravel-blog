@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <div class="row bg-white p-4 w-75">
            <div class="col-12 ">
                <div class="title">
                    <div class="clearfix">
                        <small class="text-muted float-left text-capitalize">{{ $article->user->name }}</small>
                        <small
                            class="text-muted float-right">{{ date('j M, Y', strtotime( $article->created_at ))  }}</small>
                    </div>
                    <h2 class="article-title mt-3">{{ $article->title }}<small></small></h2>
                </div>
                <div class="subtitle text-muted">
                    {{ $article->excerpt }}
                </div>
                <hr>
                <p>
                    {{ $article->body }}
                </p>
                @foreach ( $article->tags as $tag)
                    <a class="badge badge-secondary"
                       href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="row w-75">
            <div class="col-12">
                <hr>
            </div>
        </div>
        @include('articles.commentsDisplay', ['comments' => $article->comments, 'post_id' => $article->id])

        <hr />
        <h4>Add comment</h4>
        <form method="post" action="{{ route('comments.store'   ) }}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="body"></textarea>
                <input type="hidden" name="post_id" value="{{ $article->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add Comment" />
            </div>
        </form>
    </div>



@endsection


@section('style')
    <style>
        .article-title {
            font-weight: bold;
        }
    </style>
@endsection
