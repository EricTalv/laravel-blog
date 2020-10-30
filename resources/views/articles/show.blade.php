@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>{{ $article->title }}</h2>
                    <pre>{{ $article->excerpt }}</pre>
                    <p><small>{{ $article->created_at }}</small></p>
                </div>

                <p>
                    {{ $article->body }}
                </p>
            </div>
        </div>
    </div>
@endsection
