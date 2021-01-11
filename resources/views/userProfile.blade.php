@extends('layouts.app')


@section('content')

    <h1>I am {{ $user->name }}</h1>
    <ol>
    @foreach( $user->articles as $article)

           <li>
               {{ $article->title }}
           </li>

    @endforeach
    </ol>


@endsection
