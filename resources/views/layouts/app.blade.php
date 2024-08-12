<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# website: https://ogp.me/ns/website#">
    <meta charset="utf-8">

    <meta name="description" content="楽単に特化した関西学院大学の授業評価サイトです。">
    <meta name="keywords" content="関西学院大学,楽単,授業情報,楽単発見器,授業評価,授業レビュー">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '楽単発見器 - 関西学院大学') }}</title>
    <link rel="canonical" href="https://rakutan.herokuapp.com">

    <meta property="og:title" content="楽単発見器 - 関西学院大学">
    <meta property="og:description" content="関西学院大学の授業評価サイト。関西学院大学の教授・授業に対する評価や学生のコメントを掲載。">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="楽単発見器">
    <meta property="og:url" content="https://rakutan.herokuapp.com">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- 開発環境では"style.cssをasset関数で呼び出す（絶対パスで読み込むことが可能） -->
    <!-- 本番環境の場合でSSL貸した通信しか行わないのであれば"style.cssをsecure_asset関数を使う -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bs-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('/images/logo.jpg') }}" alt="サイトロゴ"></a>
                <!-- <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">楽単発見器</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">楽単ランキング（準備中）</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container text-center">
            <div class="link">
                <a href="{{ route('terms') }}" style="padding:0.3rem;">利用規約</a>
                <a href="{{ route('privacy') }}" style="padding:0.3rem;">プライバシーポリシー</a>
                <a href="mailto:gtw65115@kwansei.ac.jp" style="padding:0.3rem;">お問い合わせ</a>
            </div>
            <!-- <div class="madeby">
                Made by Yu Sugimoto.
            </div> -->
        </div>
    </footer>
</body>

</html>