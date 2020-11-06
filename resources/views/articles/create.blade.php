@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input
                            {{-- If we have an error, add is-danger class  --}}
                            class="input {{ !$errors->has('title') ?  '' : 'is-danger' }}"
                            type="text"
                            name="title"
                            id="title"
                            {{-- Retreives an old input item --}}
                            value="{{ old('title') }}"
                        >
                    </div>
                    {{--
                     @error is a helper in blade -> if we have any errors,
                      this will render and display the error message as $message
                    --}}
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

                    <div class="control select is-multiple">
                        {{--
                             tags[] enables us to fetch multiple (array)
                             options to send as a request instead of one
                        --}}
                        <select name="tags[]" multiple>
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
