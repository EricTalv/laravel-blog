@extends('layouts.app')

@section('title') Welcome @endsection

@section('style')
    <style>

        .first-post-gradient {
            background-color: #8EC5FC !important;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%) !important;
        }

        .text-overflow-fix {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        {{--        TAGS START --}}
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach($tags as $tag)
                    <a class="p-2 text-muted"
                       href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
                <a class="p2- text-muted" href="{{ route('alltags')  }}">All Tags</a>
            </nav>
        </div>
        {{--        TAGS END --}}

        {{--        NEWEST ARTICLE START--}}
        <div class="jumbotron p-3 p-md-5 text-white rounded first-post-gradient">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic text-capitalize">{{ $newestArticle->title }}</h1>
                <p class="lead my-3 ">{{ $newestArticle->excerpt }}</p>
                <p class="lead mb-0"><a href="/article/{{ $newestArticle->id }}" class="text-white font-weight-bold">Continue
                        reading...</a></p>
            </div>
        </div>
        {{--        NEWEST ARTICLE END--}}

        {{--        FEATURED ARTICLES START--}}
        @if (!$featuredArticles->isEmpty())
            <div class="row mb-2 justify-content-center">
                @foreach($featuredArticles as $featuredArticle )
                    <div class="col-md">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250 card-fix">
                            <div class="card-body d-flex flex-column align-items-start">

                                @foreach($featuredArticle->tags as $tag)<small><strong
                                        class="d-inline-block mb-2 badge badge-dark">{{ $tag->name }}
                                </small></strong>  @endforeach

                                <h3 class="mb-0">
                                    <a class="text-dark text-capitalize" href="#">{{$featuredArticle->title}}</a>
                                </h3>
                                <div
                                    class="mb-1 text-muted">{{ date('j M Y', strtotime( $featuredArticle->created_at ))  }}</div>
                                <p class="card-text mb-auto"
                                   style="overflow: hidden; text-overflow: ellipsis;">{{ $featuredArticle->excerpt }}<a
                                        href="/articles/{{ $featuredArticle->id }}">Continue reading</a>
                                </p>
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block" src="https://picsum.photos/200"
                                 alt="Card image cap">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{--        FEATURED ARTICLES END --}}
    </div>

    {{--  RECENT ARTICLES SECTION START  --}}
    <main role="main" class="container">
        <div class="row">
            {{--                THREE LATEST ARTICLES START--}}
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Recent Articles
                </h3>

                @foreach( $threeLatestArticles as $article )
                    <div class="blog-post">
                        <h2 class="blog-post-title text-capitalize">{{ $article->title }}</h2>
                        <p class="blog-post-meta">{{ date('j F Y', strtotime( $article->created_at ))  }} by <a
                                href="{{ route('user', $article->user->id) }}"
                                class="text-capitalize">{{ $article->user->name }}</a></p>

                        <p>{{ $article->excerpt }}</p>
                        <hr>
                        <p>{{ \Illuminate\Support\Str::limit($article->body, 500, $end='...')  }}</p>
                        <a href="{{ $article->path }}">Continue reading</a>

                    </div>
                @endforeach

                {{ $threeLatestArticles->links('pagination.welcome-pagination') }}

            </div>
            {{--                     THREE LATEST ARTICLES END--}}


            <aside class="col-md-4 blog-sidebar">
                {{--                ABOUT ASIDE START--}}
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">
                        This is a laravel blog.
                        Made purely on Laravel and PHP technologies.
                        Everything(most) you see, read and press is all dynamically retrieved
                        from my MySQL database.
                    </p>
                    <a href="/about">Continue reading</a>
                </div>
                {{--                ABOUT ASIDE END--}}


                {{--                FEATURED ARTICLE ASIDE START --}}
                @if (!$featuredArticles->isEmpty())
                    <div class="p-3">
                        <h4 class="font-italic">Featured Articles</h4>
                        <ol class="list-unstyled mb-0">
                            @foreach( $allFeaturedArticles as $article)
                                <li><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                {{--                FEATURED ARTICLE ASIDE END --}}


                <div class="p-3">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="https://github.com/EricTalv">GitHub</a></li>
                        <li><a href="https://twitter.com/EricTalviste">Twitter</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->
@section('footer')
    <footer class="blog-footer">
        <p>Blog made with ❤️ by <a href="https://github.com/EricTalv">Eric</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
@endsection


@endsection
