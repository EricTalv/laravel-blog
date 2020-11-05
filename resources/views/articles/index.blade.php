@extends('layout')

@section('style')
    <style>
        .edit-option {
            display: none;
            text-transform: none;
        }

        .show-options:hover > .edit-option, .edit-option:hover {
            display: inline-block !important;
        }
    </style>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @if (!$articles->isEmpty())
                    <div class="title is-4">
                        <h2>Articles</h2>
                    </div>
                    <ul>
                        <li>
                            @foreach ($articles as $article)

                                <div class="section pt-0 show-options ">
                                    <a style="z-index: 3; float: right;" class=" button edit-option"
                                       href="/articles/edit/{{ $article->id }}">Edit</a>
                                    <div class="title is-capitalized ">
                                        <h3>
                                            <u>
                                                <a class="has-text-dark has-text-weight-bold"
                                                   href="/articles/{{ $article->id }}">
                                                    {{ $article->title }}
                                                </a>
                                            </u>
                                        </h3>
                                    </div>
                                    <div class="subtitle">
                                        <h5>
                                            {{ $article->excerpt }}
                                        </h5>
                                        <p><small>{{ date('j M Y', strtotime( $article->created_at ))  }}</small></p>
                                    </div>

                                </div>
                            @endforeach
                        </li>
                    </ul>
                @else
                    <div class="title">
                        <h1>No articles available</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
