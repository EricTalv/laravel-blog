@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>articles</h2>
                </div>
                <ul>
                    <li>
                        @foreach ($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <pre>{{ $article->excerpt }}</pre>
                            <p><small>{{ $article->created_at }}</small></p>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
