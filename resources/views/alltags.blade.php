@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Tags</h1>
    <div class="tagCloud" style="align-items: flex-start;">
        @foreach($tags as $tag)

            @if($tag->articles()->count() !== 0)

                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}"
                    style="
                   font-size:  {{ ( 15 * $tag->articles()->count()) }}px;

                   align-items: center;
                   white-space: nowrap;
                   " class="m-3 btn btn-secondary  ">
                    {{ $tag->name }}
                    <s pan class="badge badge-light mx-1">{{ $tag->articles()->count() }}</span>
                </a>

            @endif
        @endforeach
    </div>
</div>
@endsection
