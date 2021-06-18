<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>

    <link href="{{mix('/css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row bg-dark">
        <div class="col-12" style="height: 80px;">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Главная<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/articles/">Статьи</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
    <div class="row">
        @yield('content')
    </div>
    <div class="row bg-dark text-light">
        <div class="col-12" style="height: 80px;">Footer</div>
    </div>
</div>

<script type="text/javascript" src="{{mix('/js/app.js')}}"></script>
</body>
</html>
