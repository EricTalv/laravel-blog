@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>articles</h2>
                </div>
                @if (!$articles)
                     <h1>No articles</h1>
                @else
                <ul>
                    <li>
                        @foreach ($articles as $article)
                            <h1><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h1>
                            <pre>{{ $article->excerpt }}</pre>
                            <p><small>{{ $article->created_at }}</small></p>
                        @endforeach
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
