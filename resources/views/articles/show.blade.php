@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title" style="text-transform: capitalize;">
                    <h3>{{ $article->title }} | <small>{{ date('j M Y', strtotime( $article->created_at ))  }}</small></h3>
                </div>

                <div class="subtitle">
                {{ $article->excerpt }}
                </div>

                <p>
                    {{ $article->body }}
                </p>

                @foreach ( $article->tags as $tag)
                    <span class="tag is-dark mx-1 mt-2"><a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
