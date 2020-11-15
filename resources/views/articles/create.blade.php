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
        <form method="POST" action="{{ route('articles.store') }}" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title"><h4>Title</h4></label>
                <input
                    {{-- If we have an error, add is-danger class  --}}
                    class="form-control {{ !$errors->has('title') ?  '' : 'invalid-feedback' }}"
                    type="text"
                    name="title"
                    id="title"
                    {{-- Retreives an old input item --}}
                    value="{{ old('title') }}"
                >
            </div>
            @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="excerpt"><h4>Excerpt</h4></label>
                <textarea
                    class="form-control {{ !$errors->has('excerpt') ?  '' : 'invalid-feedback' }}"
                    name="excerpt"
                    rows="3"
                    id="excerpt">{{ old('excerpt') }}</textarea>
            </div>
            @error('excerpt')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="body"><h4>Body</h4></label>
                <textarea
                    class="form-control {{ !$errors->has('body') ?  '' : 'invalid-feedback' }}"
                    name="body"
                    rows="3"
                    id="body">{{ old('body') }}</textarea>
            </div>
            @error('body')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="existing-tags-input"><h4>Tags</h4></label>
                {{--
                           tags[] enables us to fetch multiple (array)
                           options to send as a request instead of one.

                           This however lets you add EXISTING tags
                      --}}
                <select name="tags[]" class="form-control form-control-lg" multiple >
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <small class="from-text text-muted">Hold down control to select multiple options</small>
            </div>
            @error('tags')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </form>
    </div>
@endsection
