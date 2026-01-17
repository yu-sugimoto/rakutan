@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Hero Section -->
            <div class="university">
                <h5><i class="bi bi-mortarboard-fill me-2"></i>関学生のための楽単発見器</h5>
            </div>

            <!-- Syllabus Link -->
            <div class="syllabus">
                <p class="text-center mb-0">
                    <i class="bi bi-info-circle me-1"></i>
                    授業名・先生名などの確認でご使用ください<br>
                    <i class="bi bi-arrow-right me-1"></i>
                    <a href="https://syllabus.kwansei.ac.jp/uniasv2/UnSSOLoginControlFree" target="_blank" rel="noopener">
                        関西学院大学シラバス <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </p>
            </div>

            <!-- Main Content Card -->
            <div class="contents">
                <!-- Review Section -->
                <div class="content-label">
                    <i class="bi bi-pencil-square"></i>
                    授業レビューを投稿する
                </div>
                <div class="review-content">
                    <p class="mb-3">
                        <i class="bi bi-chat-quote me-1"></i>
                        これまでのレビュー件数：<strong>{{ $newid }}件</strong>
                    </p>
                    <div class="d-grid gap-2 col-md-8 mx-auto">
                        <a class="btn btn-primary" href="{{ route('review.form')}}">
                            <i class="bi bi-plus-circle me-1"></i>レビューを投稿する
                        </a>
                    </div>
                </div>

                <!-- Search Section -->
                <div class="content-label">
                    <i class="bi bi-search"></i>
                    授業レビューを探す
                </div>
                <div class="search-content">
                    <div class="search-field">
                        <form action="{{ route('search') }}" method="get">
                            @csrf
                            <div class="setting-area">
                                <label class="form-label" for="department-label">
                                    <i class="bi bi-building me-1"></i>学部名
                                </label>
                                <select class="form-select" name="department" id="department-label">
                                    <option value="">すべての学部</option>
                                    <option value="神学部">神学部</option>
                                    <option value="文学部">文学部</option>
                                    <option value="社会学部">社会学部</option>
                                    <option value="法学部">法学部</option>
                                    <option value="経済学部">経済学部</option>
                                    <option value="商学部">商学部</option>
                                    <option value="理工学部">理工学部</option>
                                    <option value="総合政策学部">総合政策学部</option>
                                    <option value="人間福祉学部">人間福祉学部</option>
                                    <option value="教育学部">教育学部</option>
                                    <option value="国際学部">国際学部</option>
                                    <option value="理学部">理学部</option>
                                    <option value="工学部">工学部</option>
                                    <option value="生命環境学部">生命環境学部</option>
                                    <option value="建築学部">建築学部</option>
                                    <option value="スポーツ健康科学プログラム事務局">スポーツ健康科学プログラム事務局</option>
                                    <option value="共通教育センター">共通教育センター</option>
                                    <option value="キャリアセンター">キャリアセンター</option>
                                    <option value="共通教育センター（情報科学科目）">共通教育センター（情報科学科目）</option>
                                    <option value="言語教育研究センター">言語教育研究センター</option>
                                    <option value="国際教育・協力センター（CIEC JEASP）">国際教育・協力センター（CIEC JEASP）</option>
                                    <option value="教職教育研究センター（資格）">教職教育研究センター（資格）</option>
                                    <option value="教職教育研究センター（教職専門）">教職教育研究センター（教職専門）</option>
                                    <option value="国際教育・協力センター/CIEC">国際教育・協力センター/CIEC</option>
                                    <option value="キリスト教と文化研究センター">キリスト教と文化研究センター</option>
                                    <option value="日本語教育センター">日本語教育センター</option>
                                    <option value="ハンズオン・ラーニングセンター">ハンズオン・ラーニングセンター</option>
                                    <option value="国連・外交統括センター">国連・外交統括センター</option>
                                </select>
                            </div>
                            <div class="setting-area">
                                <label class="form-label" for="lecture-label">
                                    <i class="bi bi-book me-1"></i>授業名
                                </label>
                                <input class="form-control" type="text" name="lecture" id="lecture-label" placeholder="授業名を入力">
                            </div>
                            <div class="setting-area">
                                <label class="form-label" for="teacher-label">
                                    <i class="bi bi-person me-1"></i>先生名
                                </label>
                                <input class="form-control" type="text" name="teacher" id="teacher-label" placeholder="先生名を入力">
                            </div>
                            <div class="d-grid gap-2 col-md-8 mx-auto mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search me-1"></i>検索する
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
