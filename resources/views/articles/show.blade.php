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

        <h4>Add comment</h4>
        <form method="post" action="{{ route('comments.store'   ) }}">
            @method('PUT')

            <div class="form-group">
                <textarea class="form-control" name="body"></textarea>
                <input type="hidden" name="article_id" value="{{ $article->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add Comment" />
            </div>
        </form>

        @include('articles.commentsDisplay', ['comments' => $article->comments, 'article_id' => $article->id])


        <hr>

        <div class="row w-75 ">
            <div class="col-12 p-0">
                <div class="comment-input mb-3 ">
                    <div class="comment px-3 py-3 bg-white rounded">
                        <img src="https://picsum.photos/80" class="avatar float-left mr-2">
                        <div class="row">
                            <div class="comment-input-data w-100">
                                <div class="username font-weight-bold">William Shakesphear The Third<small
                                        class="text-muted small ml-2">12 Dec, 2020</small>
                                </div>
                                <div class="comment-text-input">
                                    <form>
                                        <div class="form-group">
                                            <textarea class="form-control" class="comment-input" rows="5" ></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="comment-buttons float-right ">
                                    <button class="btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comments w-100">
                <div class="comment px-3 py-3 bg-white rounded">
                    <img src="https://picsum.photos/80" class="avatar float-left mr-2">
                    <div class="row">
                        <div class="comment-data">
                            <div class="username font-weight-bold">William Shakesphear The Third<small
                                    class="text-muted small ml-2">12 Dec, 2020</small>
                            </div>
                            <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Consectetur consequuntur deleniti earum ex
                            </div>
                            <div class="comment-buttons float-right my-1 mr-4">
                                <button class="btn btn-outline-success">Like</button>
                                <button class="btn btn-outline-primary">Reply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>


@endsection


@section('style')
    <style>
        .article-title {
            font-weight: bold;
        }
    </style>
@endsection
