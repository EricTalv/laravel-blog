@extends('layouts.app')

@section('scripts')
    <script type="text/javascript">
        window.addEventListener('keydown', function (e) {
            if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
                if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
                    e.preventDefault();
                    return false;
                }
            }
        }, true);
    </script>
@endsection

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('articles.store') }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>
    </div>
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="POST" action="">
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
                    <label for="tagger" class="label">Tags</label>
                    <div class="control">
                        {{--

                            You should be able to write any word into the
                            input, press enter, this creates a Word-Label.

                            These will be posted and later added to the post.

                            If theres a new TAG it will be created into the
                            TAGS table.
                            Otherwise we will just add it.

                        --}}
                        <input
                            class="input"
                            type="text"
                            name="tagger"
                            id="tagger"
                        >
                        <script>

                        </script>
                    </div>
                </div>

                <div class="field">
                    <label for="tagger" class="label">Existing tags</label>
                    <div class="control">
                        {{--
                             tags[] enables us to fetch multiple (array)
                             options to send as a request instead of one.

                             This however lets you add EXISTING tags
                        --}}
                        <select name="tags[]" class="select is-multiple" multiple>
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
