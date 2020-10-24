@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Our Articles</h2>
                    <p><img src="images/banner.jpg" alt="" class="image image-full"/></p>
                </div>
                <div id="sidebar">
                    <ul class="style1">
                        @foreach( $articles as $article)
                            <li class="first">
                                <h3><a href="/articles/{{ $article->id }}"> {{ $article->title }}</a></h3>
                                <p>{{ $article->excerpt }}</p>
                                <p>{{ $article->created_at }}</p>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
@endsection
