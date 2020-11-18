@extends('layouts.app')

@section('style')
    <style>
        .form-group > label > h4 {
            font-weight: bold !important;
        }
    </style>
@endsection

@section('title')
    Create Article
@endsection

@section('scripts')
{{--    --}}
{{--    This is to remove ENTER-key to SUBMIT the form --}}
{{--    <script type="text/javascript">--}}
{{--        window.addEventListener('keydown', function (e) {--}}
{{--            if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {--}}
{{--                if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {--}}
{{--                    e.preventDefault();--}}
{{--                    return false;--}}
{{--                }--}}
{{--            }--}}
{{--        }, true);--}}
{{--    </script>--}}
@endsection

@section('content')

    <div class="container">
        <form class="needs-validation " novalidate method="POST" action="{{ route('articles.store') }}" >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title"><h4>Title</h4></label>
                <input
                    {{-- If we have an error, add is-danger class  --}}
                    class="form-control  {{ !$errors->has('title') ?  '' : 'is-invalid' }}"
                    type="text"
                    name="title"
                    id="title"
                    {{-- Retreives an old input item --}}
                    value="{{ old('title') }}"
                >
                @error('title')

                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="excerpt"><h4>Excerpt</h4></label>
                <textarea
                    class="form-control {{ !$errors->has('excerpt') ?  '' : 'is-invalid' }}"
                    name="excerpt"
                    rows="3"
                    id="excerpt">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="body"><h4>Body</h4></label>
                <textarea
                    class="form-control {{ !$errors->has('body') ?  '' : 'is-invalid' }}"
                    name="body"
                    rows="3"
                    id="body">{{ old('body') }}</textarea>
            @error('body')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
                <label for="existing-tags-input"><h4>Tags</h4></label>
                {{--
                           tags[] enables us to fetch multiple (array)
                           options to send as a request instead of one.

                           This however lets you add EXISTING tags
                      --}}
{{--                <select name="tags[]" class="form-control form-control-lg" multiple >--}}
{{--                    @foreach($tags as $tag)--}}
{{--                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                --}}

                <tag-input></tag-input>

                @error('tags')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
    <hr>

@endsection
