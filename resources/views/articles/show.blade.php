@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center ">
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
        <hr>
        <div class="row bg-white w-75">
            <div class="col-12 ">
                <div class="comment-input"></div>
                <div class="comments">
                    <div class="comment">
                        <img src="https://picsum.photos/80" class="avatar">
                        <div class="username">Freekdude20</div>
                        <div class="comment-text">This is really cool!</div>
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
