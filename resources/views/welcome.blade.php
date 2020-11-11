@extends ('layout')

@section ('header')
    <div id="header-featured">
        <div id="banner-wrapper">
            <div id="banner" class="container">

                @if (Auth::check())
                 <h2>Welcome {{ Auth::user()->name }}</h2>
                @else
                    <h2>Welcome</h2>
                @endif



                <p>This is <strong>SimpleBlog</strong></br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae delectus error explicabo ipsum
                    labore libero maxime modi nisi recusandae voluptatibus.
                </p>
            </div>
        </div>
@endsection
