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
        <article-form></article-form>
    </div>

@endsection
