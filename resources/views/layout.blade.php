<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"/>

    <link href="/css/default.css" rel="stylesheet"/>
    <link href="/css/fonts.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/app.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.css">


    @yield('head')
    @yield('style')
</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                @guest
                    <li class="{{ request()->is('/login') ? 'current_page_item' : '' }}">
                        <a href="/login" accesskey="1"
                           title="">Login</a>
                    </li>
                @else
                    <li class="{{ request()->is('/home') ? 'current_page_item' : '' }}"><a href="/home" accesskey="1" title="">Dashboard</a>
                    </li>
                @endguest

                <li class="{{ request()->is('/') ? 'current_page_item' : '' }}"><a href="/" accesskey="1" title="">Welcome</a>
                </li>
                <li class="{{ request()->is('articles') ? 'current_page_item' : '' }}"><a href="/articles"
                                                                                          accesskey="1" title="">Articles</a>
                </li>
                <li class="{{ request()->is('about') ? 'current_page_item' : '' }}"><a href="/about" accesskey="1"
                                                                                       title="">About</a>
                </li>
                <li class="{{ request()->is('articles/create') ? 'current_page_item' : '' }}"><a
                        href="{{ route('articles.create') }}" accesskey="1" title="">Create</a>
                </li>
            </ul>
        </div>
    </div>
    @yield ('header')
</div>
@yield ('content')
@yield ('scripts')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
