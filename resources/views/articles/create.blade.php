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

@section('content')

<div class="container">
    <create-form></create-form>
</div>
<hr>

@endsection
