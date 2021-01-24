@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Tags</h1>
        <div class="row" style="align-items: flex-start;">
            @foreach($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}"
                   style="
                       font-size:  {{ ( 15 * $tag->articles()->count()) }}px;
                       display: flex;
                       align-items: center;
                       justify-content: center;
                       margin: 0;
                       "
                   class="m-3 btn btn-secondary  ">
                    {{ $tag->name }}
                    <span class="badge badge-light mx-1">{{ $tag->articles()->count() }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
