@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content is-large">

                @if (!$articles->isEmpty())
                    <ul>
                        <li>
                            @foreach ($articles as $article)
                                <div class="level">
                                    <h1><a href="/articles/{{ $rticle->id }}">{{ $article->title }}</a></h1>
                                    <p>{{ $article->excerpt }}</p>
                                    <p><small>{{ $article->created_at }}</small></p>
                                    <button><a href="/articles/edit/{{ $article->id }}">Edit</a></button>
                                </div>
                            @endforeach
                        </li>
                    </ul>
                @else
                    <div class="title">
                        <h2>No articles available</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
