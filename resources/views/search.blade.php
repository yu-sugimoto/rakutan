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
                    <!-- Search Form -->
                    <div class="search-field">
                        <form action="{{ route('search') }}" method="get">
                            @csrf
                            <div class="setting-area">
                                <label class="form-label" for="department-label">
                                    <i class="bi bi-building me-1"></i>学部名
                                </label>
                                <select class="form-select" name="department" id="department-label">
                                    <option value="">すべての学部</option>
                                    <option value="神学部" @if($department=="神学部") selected @endif>神学部</option>
                                    <option value="文学部" @if($department=="文学部") selected @endif>文学部</option>
                                    <option value="社会学部" @if($department=="社会学部") selected @endif>社会学部</option>
                                    <option value="法学部" @if($department=="法学部") selected @endif>法学部</option>
                                    <option value="経済学部" @if($department=="経済学部") selected @endif>経済学部</option>
                                    <option value="商学部" @if($department=="商学部") selected @endif>商学部</option>
                                    <option value="理工学部" @if($department=="理工学部") selected @endif>理工学部</option>
                                    <option value="総合政策学部" @if($department=="総合政策学部") selected @endif>総合政策学部</option>
                                    <option value="人間福祉学部" @if($department=="人間福祉学部") selected @endif>人間福祉学部</option>
                                    <option value="教育学部" @if($department=="教育学部") selected @endif>教育学部</option>
                                    <option value="国際学部" @if($department=="国際学部") selected @endif>国際学部</option>
                                    <option value="理学部" @if($department=="理学部") selected @endif>理学部</option>
                                    <option value="工学部" @if($department=="工学部") selected @endif>工学部</option>
                                    <option value="生命環境学部" @if($department=="生命環境学部") selected @endif>生命環境学部</option>
                                    <option value="建築学部" @if($department=="建築学部") selected @endif>建築学部</option>
                                    <option value="スポーツ健康科学プログラム事務局" @if($department=="スポーツ健康科学プログラム事務局") selected @endif>スポーツ健康科学プログラム事務局</option>
                                    <option value="共通教育センター" @if($department=="共通教育センター") selected @endif>共通教育センター</option>
                                    <option value="キャリアセンター" @if($department=="キャリアセンター") selected @endif>キャリアセンター</option>
                                    <option value="共通教育センター（情報科学科目）" @if($department=="共通教育センター（情報科学科目）") selected @endif>共通教育センター（情報科学科目）</option>
                                    <option value="言語教育研究センター" @if($department=="言語教育研究センター") selected @endif>言語教育研究センター</option>
                                    <option value="国際教育・協力センター（CIEC JEASP）" @if($department=="国際教育・協力センター（CIEC JEASP）") selected @endif>国際教育・協力センター（CIEC JEASP）</option>
                                    <option value="教職教育研究センター（資格）" @if($department=="教職教育研究センター（資格）") selected @endif>教職教育研究センター（資格）</option>
                                    <option value="教職教育研究センター（教職専門）" @if($department=="教職教育研究センター（教職専門）") selected @endif>教職教育研究センター（教職専門）</option>
                                    <option value="国際教育・協力センター/CIEC" @if($department=="国際教育・協力センター/CIEC") selected @endif>国際教育・協力センター/CIEC</option>
                                    <option value="キリスト教と文化研究センター" @if($department=="キリスト教と文化研究センター") selected @endif>キリスト教と文化研究センター</option>
                                    <option value="日本語教育センター" @if($department=="日本語教育センター") selected @endif>日本語教育センター</option>
                                    <option value="ハンズオン・ラーニングセンター" @if($department=="ハンズオン・ラーニングセンター") selected @endif>ハンズオン・ラーニングセンター</option>
                                    <option value="国連・外交統括センター" @if($department=="国連・外交統括センター") selected @endif>国連・外交統括センター</option>
                                </select>
                            </div>
                            <div class="setting-area">
                                <label class="form-label" for="lecture-label">
                                    <i class="bi bi-book me-1"></i>授業名
                                </label>
                                <input class="form-control" type="text" name="lecture" id="lecture-label" value="{{ $lecture }}" placeholder="授業名を入力">
                            </div>
                            <div class="setting-area">
                                <label class="form-label" for="teacher-label">
                                    <i class="bi bi-person me-1"></i>先生名
                                </label>
                                <input class="form-control" type="text" name="teacher" id="teacher-label" value="{{ $teacher }}" placeholder="先生名を入力">
                            </div>
                            <div class="d-grid gap-2 col-md-8 mx-auto mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search me-1"></i>検索する
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Search Results -->
                    <div class="result-field">
                        <div class="result">
                            <h5><i class="bi bi-list-ul me-2"></i>検索結果</h5>
                            <div class="sort-selector">
                                <label for="sort-select" class="me-2"><i class="bi bi-sort-down me-1"></i>並び順:</label>
                                <select id="sort-select" class="form-select form-select-sm d-inline-block w-auto" onchange="changeSort(this.value)">
                                    <option value="year" @if($sort == 'year') selected @endif>受講年度順</option>
                                    <option value="rakutan" @if($sort == 'rakutan') selected @endif>楽単度順</option>
                                </select>
                            </div>
                            <p><i class="bi bi-check-circle me-1"></i>{{ $count }} 件のレビューが見つかりました</p>
                        </div>

                        @foreach($searchs as $search)
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <span class="lecture-name">
                                        <i class="bi bi-journal-text me-1"></i>{{ $search->lecture }}
                                    </span>
                                    <span class="year-badge">{{ $search->year }}</span>
                                </h6>
                                <p class="card-subtitle mb-2">
                                    <i class="bi bi-building me-1"></i>{{ $search->department }}
                                    <span class="mx-2">|</span>
                                    <i class="bi bi-person me-1"></i>{{ $search->teacher }}
                                </p>
                                <p class="card-text">
                                    <span class="rating-label">楽単度：</span>
                                    @if($search->review_easy == 5)
                                        <span class="stars">★★★★★</span>
                                    @elseif($search->review_easy == 4)
                                        <span class="stars">★★★★</span>
                                    @elseif($search->review_easy == 3)
                                        <span class="stars">★★★</span>
                                    @elseif($search->review_easy == 2)
                                        <span class="stars">★★</span>
                                    @else
                                        <span class="stars">★</span>
                                    @endif
                                </p>
                            </div>
                            <div class="accordion-header" id="heading{{ $search->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $search->id }}" aria-expanded="false" aria-controls="collapse{{ $search->id }}">
                                    <i class="bi bi-chat-left-text me-2"></i>学生のコメントを見る
                                </button>
                            </div>
                            <div id="collapse{{ $search->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $search->id }}">
                                <div class="accordion-body">
                                    {{ $search->review_comment }}
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="paginate d-flex justify-content-center">
                            {{ $searchs->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function changeSort(sortValue) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', sortValue);
    window.location.href = url.toString();
}
</script>
