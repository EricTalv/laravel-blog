@extends('layouts.app')

@section('style')
    <style>
        .form-group > label > h4 {
            font-weight: bold !important;
        }
    </style>
@endsection

@section('title')
    Edit Article
@endsection

@section('content')

    <div class="container">
        <form class="needs-validation " novalidate method="POST" action="/articles/{{ $article->id }}" >
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
                    value="{{ $errors->isEmpty() ? $article->body : old('title') }}"
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
                    id="excerpt">{{ $errors->isEmpty() ? $article->body : old('excerpt') }}</textarea>
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
                    id="body">{{ $errors->isEmpty() ? $article->body : old('body') }}</textarea>
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
{{--                @error('tags')--}}
{{--                <p class="invalid-feedback">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <small class="from-text text-muted">Hold down control to select multiple options</small>--}}

            </div>

            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
    <hr>

@endsection
