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

    @yield('head')
</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li class="{{ request()->is('/') ? 'current_page_item' : '' }}"><a href="/" accesskey="1" title="">Homepage</a>
                </li>
                <li class="{{ request()->is('articles') ? 'current_page_item' : '' }}"><a href="/articles" accesskey="1" title="">Articles</a>
                </li>
                <li class="{{ request()->is('about') ? 'current_page_item' : '' }}"><a href="/about" accesskey="1" title="">About</a>
                </li>
                <li class="{{ request()->is('articles/create') ? 'current_page_item' : '' }}"><a href="/articles/create" accesskey="1" title="">Create</a>
                </li>
            </ul>
        </div>
    </div>
    @yield ('header')
</div>
@yield ('content')

</body>
</html>
