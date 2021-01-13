@extends('layouts.app')

@section('content')
    <div class="container">
        <ol>
            @foreach($tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ol>
    </div>
@endsection
