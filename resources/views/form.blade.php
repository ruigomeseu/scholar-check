<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scholar Check - {{ $title }}</title>

    <link href="{{ elixir("css/all.css") }}" rel="stylesheet">
    <script src="{{ elixir("js/all.js") }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="login-wrapper">
                <header>
                    <div class="brand">
                        <a href="{{ url('/') }}" class="logo">
                            <i class="icon-layers"></i>
                            <span>SCHOLAR</span>CHECK</a>
                    </div>
                </header>
                @yield('content')
            </div>
        </div>
    </div>

</section>

</body>
</html>
