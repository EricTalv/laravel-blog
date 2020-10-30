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
                <li class="current_page_item"><a href="/" accesskey="1" title="">Homepage</a>
                </li>
                <li class=""><a href="/articles" accesskey="1" title="">Articles</a>
                </li>
            </ul>
        </div>
    </div>
    @yield ('header')
</div>
@yield ('content')

</body>
</html>
