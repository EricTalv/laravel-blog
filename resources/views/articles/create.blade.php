@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="POST" action="{{ route('articles.create') }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input
                            class="input {{ !$errors->has('title') ?  '' : 'is-danger' }}"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                        >
                    </div>
                    @error('title')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror

                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea
                            class="textarea {{ !$errors->has('excerpt') ?  '' : 'is-danger' }}"
                            name="excerpt"
                            id="excerpt">{{ old('excerpt') }}</textarea>
                    </div>
                    @error('excerpt')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror

                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea
                            class="textarea {{ !$errors->has('body') ?  '' : 'is-danger' }}"
                            name="body"
                            id="body">{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="tag" class="label">Tags</label>

                    <div class="control">

                        <div class="dropdown">
                            <div class="dropdown-trigger">
                                <a class="button" aria-haspopup="true" aria-controls="dropdown-menu2">
                                    <span>Content</span>
                                    <span class="icon is-small">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-menu" id="dropdown-menu2" role="menu">
                                <div class="dropdown-content">
                                    <a href="#" class="dropdown-item">
                                        This is a link
                                    </a>
                                </div>
                            </div>
                        </div>

                        <select name="tags[]" id="tags">


                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tags')
                    <p class="help is-danger">{{ $message }}</p>
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
