@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @foreach( $articles as $article)
                    <li class="first">
                        <h3><a href="/articles/{{ $article->id }}"> {{ $article->title }}</a></h3>
                        <p>{{ $article->excerpt }}</p>
                        <p>{{ $article->created_at }}</p>
                    </li>
                @endforeach
            </div>
@endsection
