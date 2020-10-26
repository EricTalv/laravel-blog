@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Edit Article</h1>

            <form method="POST" action="/articles/{{ $article->id }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input
                            class="input @error('title') is-danger @enderror"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ $errors->isEmpty() ? $article->title : old('title') }}"
                        >
                        @error('title')
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea
                            class="textarea @error('excerpt') is-danger @enderror"
                            name="excerpt"
                            id="excerpt">{{ $errors->isEmpty() ? $article->excerpt : old('excerpt') }}</textarea>
                    </div>

                    @error('excerpt')
                    <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea
                            class="textarea @error('body') is-danger @enderror"
                            name="body"
                            id="body">{{ $errors->isEmpty() ? $article->body : old('body') }}</textarea>
                    </div>
                    @error('body')
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror

                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
