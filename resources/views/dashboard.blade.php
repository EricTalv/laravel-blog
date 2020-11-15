@extends('layouts.app')

@section('title') Dashboard @endsection

@section('username')
    {{ Auth::user()->name }}
@endsection

@section('style')
    <style>
        .reformat-a-styles {
            font-weight: bold;
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <hr>
        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">My Articles</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink" style="">
                                <div class="dropdown-header">Articles</div>
                                <a class="dropdown-item" href="{{ route('articles.index') }}">New Article</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Excerpt</th>
                                <th scope="col">Date</th>
                                <th scope="col">Tags</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allUserArticles as $article)
                                <tr>
                                    <td>
                                        <a class="reformat-a-styles" target="_blank" href="/articles/{{ $article->id }}">
                                            {{ \Illuminate\Support\Str::limit($article->title, 20, $end=".." )  }}
                                        </a>
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($article->excerpt, 20, $end="..") }}</td>
                                    <td>{{ date('d.m.Y', strtotime( $article->created_at ))}} </td>
                                    @if ($article->tags)
                                        <td>
                                            @foreach($article->tags as $tag)
                                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">


            <div class="col-xl-12 mb-4">
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Latest Article</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $latestArticle->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ \Illuminate\Support\Str::limit($latestArticle->excerpt, 100, $end='...') }}</h6>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($latestArticle->body, 150, $end='...')  }}</p>
                        <a target="_blank" href="/articles/{{ $latestArticle->id }}" class="card-link">Go To Post</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
