@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h3>{{ $article->title }} |{{ $article->id }}</h3>
                    <p>{{ $article->excerpt }}</p>
                    <p><small>{{ date('j M Y', strtotime( $article->created_at ))  }}</small></p>

                </div>

                <p>
                    {{ $article->body }}
                </p>

                @foreach ( $article->tags as $tag)
                                        <span class="tag is-dark mx-1">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
