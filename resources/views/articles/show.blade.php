@extends('layouts.app')



@section('content')
    <div class="container d-flex flex-column align-items-center">
        <div class="row bg-white p-4 w-75">
            <div class="col-12 ">
                <div class="title">
                    <div class="clearfix">
                        <small class="text-muted float-left text-capitalize"><a href="{{ route('user', $article->user->slug) }}">{{ $article->user->name }}</a></small>
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
                    {!! $article->body !!}
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
        <div class="row w-75">

            <div class="col-12">
                @comments(['model' => $article])
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
