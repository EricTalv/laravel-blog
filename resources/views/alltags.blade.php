@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Tags</h1>
        <div class="row">
            @foreach($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}"
                   style="
                      height: calc(100% + {{ $tag->articles()->count() }}px);
                      height: 35 *  {{ $tag->articles()->count() }}px;
"

                   class="m-3 btn btn-secondary align-items-center">
                    {{ $tag->name }}
                    <span class="badge badge-light">{{ $tag->articles()->count() }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
