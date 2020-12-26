@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <div class="row bg-white p-4 w-75">
            <div class="col-12 ">
                <div class="title">
                    <div class="clearfix">
                        <small class="text-muted float-left text-capitalize">{{ $article->user->name }}</small>
                        <small
                            class="text-muted float-right">{{ date('j M, Y', strtotime( $article->created_at ))  }}</small>
                    </div>
                    <h2 class="article-title mt-3">{{ $article->title }}<small></small></h2>
                </div>
                <div class="subtitle text-muted">
                    {{ $article->excerpt }}
                </div>
                <hr>
                <p>
                    {{ $article->body }}
                </p>
                @foreach ( $article->tags as $tag)
                    <a class="badge badge-secondary"
                       href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="row w-75">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row  p-4 w-75">
            <div class="col-12 ">
                <div class="comment-input"></div>
                <div class="comments">
                    <div class="comment bg-white mb-2">
                        <div class="clearfix">
                            <img src="https://picsum.photos/80" class="avatar float-left mr-2">
                            <div class="comment-data">
                                <div class="username font-weight-bold">Freekdude20 <small class="text-muted small">12 Dec, 2020</small>
                                </div>
                                <div class="comment-text">This is really cool!</div>
                                <div class="comment-buttons float-right my-1 mr-4">
                                    <button class="btn btn-outline-success">Like</button>
                                    <button class="btn btn-outline-primary">Reply</button>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="comment">
                        <div class="clearfix">
                            <img src="https://picsum.photos/80" class="avatar float-left mr-2">
                            <div class="comment-data">
                                <div class="username font-weight-bold">William Shakesphear The Third<small class="text-muted small">12 Dec, 2020</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur consequuntur deleniti earum ex, fugit iure laborum modi? Accusantium ad aliquid architecto autem consequatur culpa dolore eaque eligendi est et excepturi facere harum iusto laboriosam magni minus nemo non numquam odit officia officiis perferendis perspiciatis placeat quae quod ratione reprehenderit repudiandae, sequi soluta totam ut vel vitae voluptatem. Ad aliquam aliquid animi aspernatur assumenda at atque aut beatae cum doloribus ducimus eaque eveniet fugiat impedit ipsa ipsam modi molestias necessitatibus nesciunt obcaecati odit, officiis provident quibusdam reiciendis sunt veniam voluptas voluptatibus? Delectus deserunt dicta distinctio doloribus ea esse eveniet excepturi expedita facere magnam, maiores mollitia natus nesciunt nostrum nulla odit perspiciatis possimus provident quae quisquam quos repellendus reprehenderit sed sit totam velit voluptate! Dolor explicabo fuga laudantium minima nesciunt nostrum numquam provident quae quia quidem reprehenderit tempora totam veritatis, voluptas voluptatum! Ad at cumque dolor dolores excepturi facere minus possimus rem.</div>
                                <div class="comment-buttons float-right my-1 mr-4">
                                    <button class="btn btn-outline-success">Like</button>
                                    <button class="btn btn-outline-primary">Reply</button>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('style')
    <style>
        .article-title {
            font-weight: bold;
        }
    </style>
@endsection
