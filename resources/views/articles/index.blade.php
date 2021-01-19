@extends('layouts.app')

@section('title')
    @if ( empty(request('tag')) )
        Articles
    @else
        Articles | {{ request('tag') }}
    @endif
@endsection

@section('style')
    <style>
        .edit-option {
            display: none;
            text-transform: none;
        }

        .show-options:hover > .edit-option, .edit-option:hover {
            display: inline-block !important;
        }

        .my-font-in-index {
            font-size: 2.5rem;
            font-weight: bold;
            color: black;
        }

        .card {
            box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
            transition:  transform .5s, box-shadow .5s;
        }

        .card:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @forelse ($articles as $article)
            <div class="row justify-content-center">

                <div class="card w-75 my-5  bg-white rounded">
                    @if ($article->featured)
                        <h5 class="card-header">Featured</h5>
                    @endif
                    <div class="card-body">
                        <h5 class=" card-title text-capitalize "><a class="my-font-in-index" href="{{ $article->path() }}">{{ $article->title }}</a></h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ date('j M Y', strtotime( $article->created_at ))  }}</h6>
                        <p class="card-text">{{ $article->excerpt }}</p>


                        @foreach ( $article->tags as $tag)
                            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="badge badge-secondary">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-light" role="alert">
                No relevant articles yet.
            </div>
        @endforelse
    </div>

@endsection
