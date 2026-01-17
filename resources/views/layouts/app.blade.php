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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3325377930156590" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header-modern">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
                    <img src="{{ asset('/images/logo.jpg') }}" alt="楽単発見器" class="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">
                                <i class="bi bi-house-door me-1"></i>ホーム
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('review.form') }}">
                                <i class="bi bi-pencil-square me-1"></i>レビュー投稿
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ranking.lecture') }}">
                                <i class="bi bi-trophy me-1"></i>授業ランキング
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ranking.teacher') }}">
                                <i class="bi bi-award me-1"></i>先生ランキング
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer-modern">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <img src="{{ asset('/images/logo.jpg') }}" alt="楽単発見器" class="footer-logo">
                    <span>関学生のための楽単発見器</span>
                </div>
                <div class="footer-links">
                    <a href="{{ route('terms') }}">
                        <i class="bi bi-file-text me-1"></i>利用規約
                    </a>
                    <a href="{{ route('privacy') }}">
                        <i class="bi bi-shield-check me-1"></i>プライバシーポリシー
                    </a>
                    <a href="mailto:yuyuyuk2002@gmail.com">
                        <i class="bi bi-envelope me-1"></i>お問い合わせ
                    </a>
                </div>
                <div class="footer-copy">
                    <small>&copy; {{ date('Y') }} 楽単発見器 for 関西学院大学</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
