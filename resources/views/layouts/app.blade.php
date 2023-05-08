<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LCGB0E1DLJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LCGB0E1DLJ');
    </script>
    <!-- Google adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3325377930156590" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="description" content="関西学院大学の授業評価サイト。関西学院大学の教授・授業に対する評価や学生のコメントを掲載。">
    <meta name="keywords" content="関西学院大学,楽単,授業情報,楽単発見器">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bs-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('/images/logo.jpg') }}" alt="サイトロゴ"></a>
                <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">楽単発見器</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">学部別教授ランキング（準備中）</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                会社情報
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">会社HP</a></li>
                                <li><a class="dropdown-item" href="#">お問い合わせ</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-8 contact-link">
                    <a href="mailto:info&#64;yuyuyuk2002@gmail.com">お問い合わせ</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>