@extends ('layout')

@section ('header')
    <div id="header-featured">
        <div id="banner-wrapper">
            <div id="banner" class="container">
                <h2>Welcome</h2>

                <input value='[{"value":"foo", "editable":false}, {"value":"bar"}]'>

                <script>

                    var inputElement = document.querySelector('input')
                    new Tagify(inputElement)

                </script>

                <p>This is <strong>SimpleBlog</strong></br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae delectus error explicabo ipsum
                    labore libero maxime modi nisi recusandae voluptatibus.
                </p>
            </div>
        </div>
@endsection
