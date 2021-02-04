@extends('layouts.app')

@section('style')
<style>
    .reformat-a-styles {
        font-weight: bold;
        color: black;
    }
</style>
@endsection

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
                    </div>

                    <div class="row">

                        <!-- PROFILE IMAGE CARD -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                   Image
                                </div>
                            </div>
                        </div>

                        <!-- Latest Articles  -->
                        <div class="col-xl-8 col-lg-7">
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
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($threeLatestArticles as $article)
                                            <tr>
                                                <td>
                                                    <a class="reformat-a-styles" target="_blank"
                                                       href="/articles/{{ $article->id }}">
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
                                                <td>
                                                    <a class="btn btn-warning" href="/articles/edit/{{$article->id}}">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
            
                                    </table>
                                    {{ $threeLatestArticles->links('pagination.dashboard-pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total amount of views -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Amount Of Views</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">5,245</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Last login -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Last login</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->last_online_at }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comments -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments made
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">523</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->


                    <!-- Bio & Latest Article -->
                    <div class="row">

                        {{-- BIO START --}}
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bio</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti est possimus quas ullam. Eligendi, vitae.</p>

                                </div>
                            </div>
                        </div>
                        {{-- BIO END --}}


                        {{-- LATEST ARTICLE START --}}
                        <div class="col-lg-6 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Latest Article</h6>
                                </div>
                                <div class="card-body">
                                    <h1>Title</h1>
                                    <p>Excerpt Lorem ipsum dolor sit amet.</p>      
                                    <button class="btn btn-primary">Go</button>
                                </div>
                            </div>
                        </div>
                        {{-- LATEST ARTICLE END --}}

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

@endsection

