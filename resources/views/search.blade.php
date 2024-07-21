@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid col-sm-8">
            <div class="university">
                <h5 class="text-center">関学生のための楽単発見器</h5>
            </div>
            <div class="syllabus">
                <p class="text-center">授業名・先生名などの確認でご使用ください<br>
                    → <a href="https://syllabus.kwansei.ac.jp/uniasv2/UnSSOLoginControlFree">関西学院大学シラバス</a>
                </p>
            </div>
            <div class="contents">
                <div class="content-label">
                    授業レビューを投稿する
                </div>
                <div class="review-content">
                    <p style='padding: 0 1rem'>これまでのレビュー件数：{{ $newid }}件</p>
                    <div class="d-grid gap-2 col-10 mx-auto">
                        <a class="btn btn-primary" href="{{ route('review.form')}}">投稿</a>
                    </div>
                </div>
                <div class="content-label">
                    授業レビューを探す
                </div>
                <div class="search-content">
                    <!-- 検索フォームはここから -->
                    <div class="search-field">
                        <form action="{{ route('search') }}" method="get">
                            @csrf

                            <div class='setting-area' style='padding: 0.2rem 1rem'>
                                <label for='department-label'>学部名</label>
                                <select class="form-select" name="department" id="department-label">
                                    <option value=""></option>
                                    <option value="神学部" @if($department=="神学部" ) selected @endif>神学部</option>
                                    <option value="文学部" @if($department=="文学部" ) selected @endif>文学部</option>
                                    <option value="社会学部" @if($department=="社会学部" ) selected @endif>社会学部</option>
                                    <option value="法学部" @if($department=="法学部" ) selected @endif>法学部</option>
                                    <option value="経済学部" @if($department=="経済学部" ) selected @endif>経済学部</option>
                                    <option value="商学部" @if($department=="商学部" ) selected @endif>商学部</option>
                                    <option value="理工学部" @if($department=="理工学部" ) selected @endif>理工学部</option>
                                    <option value="総合政策学部" @if($department=="総合政策学部" ) selected @endif>総合政策学部</option>
                                    <option value="人間福祉学部" @if($department=="人間福祉学部" ) selected @endif>人間福祉学部</option>
                                    <option value="教育学部" @if($department=="教育学部" ) selected @endif>教育学部</option>
                                    <option value="国際学部" @if($department=="国際学部" ) selected @endif>国際学部</option>
                                    <option value="理学部" @if($department=="理工学部" ) selected @endif>理学部</option>
                                    <option value="工学部" @if($department=="工学部" ) selected @endif>工学部</option>
                                    <option value="生命環境学部" @if($department=="生命環境学部" ) selected @endif>生命環境学部</option>
                                    <option value="建築学部" @if($department=="建築学部" ) selected @endif>建築学部</option>
                                    <option value="スポーツ健康科学プログラム事務局" @if($department=="スポーツ健康科学プログラム事務局" ) selected @endif>スポーツ健康科学プログラム事務局</option>
                                    <option value="共通教育センター" @if($department=="共通教育センター" ) selected @endif>共通教育センター</option>
                                    <option value="キャリアセンター" @if($department=="キャリアセンター" ) selected @endif>キャリアセンター</option>
                                    <option value="共通教育センター（情報科学科目）" @if($department=="共通教育センター（情報科学科目）" ) selected @endif>共通教育センター（情報科学科目）</option>
                                    <option value="言語教育研究センター" @if($department=="建築学部" ) selected @endif>言語教育研究センター</option>
                                    <option value="国際教育・協力センター（CIEC JEASP）" @if($department=="国際教育・協力センター（CIEC JEASP）" ) selected @endif>国際教育・協力センター（CIEC JEASP）</option>
                                    <option value="教職教育研究センター（資格）" @if($department=="教職教育研究センター（資格）" ) selected @endif>教職教育研究センター（資格）</option>
                                    <option value="教職教育研究センター（教職専門）" @if($department=="教職教育研究センター（教職専門）" ) selected @endif>教職教育研究センター（教職専門）</option>
                                    <option value="国際教育・協力センター/CIEC" @if($department=="国際教育・協力センター/CIEC" ) selected @endif>国際教育・協力センター/CIEC</option>
                                    <option value="キリスト教と文化研究センター" @if($department=="キリスト教と文化研究センター" ) selected @endif>キリスト教と文化研究センター</option>
                                    <option value="日本語教育センター" @if($department=="日本語教育センター" ) selected @endif>日本語教育センター</option>
                                    <option value="ハンズオン・ラーニングセンター" @if($department=="ハンズオン・ラーニングセンター" ) selected @endif>ハンズオン・ラーニングセンター</option>
                                    <option value="国連・外交統括センター" @if($department=="国連・外交統括センター" ) selected @endif>国連・外交統括センター</option>
                                </select>
                            </div>
                            <div class='setting-area' style='padding: 0.2rem 1rem'>
                                <label for="lecture-label">授業名</label>
                                <input class="form-control" type="text" name="lecture" id="lecture-label" value="{{ $lecture }}">
                            </div>
                            <div class='setting-area' style='padding: 0.2rem 1rem'>
                                <label for="teacher-label">先生名</label>
                                <input class="form-control" type="text" name="teacher" id="teacher-label" value="{{ $teacher }}">
                            </div>
                            <div class="d-grid gap-2 col-10 mx-auto" style='padding-top: 0.8rem'>
                                <input type='submit' class="btn btn-primary" value="検索">
                            </div>
                        </form>
                    </div>
                    <!-- 検索結果はここから -->
                    <div class="result-field">
                        <div class='result'>
                            <h5>検索結果</h5><span>新着順</span>
                            <p>{{ $count }} 件のレビューが見つかりました</p>
                        </div>
                        @foreach($searchs as $search)
                        <div class="card d-grid gap-2 col-10 mx-auto" style="margin-bottom: 0.5rem;">
                            <div class="card-body" style='padding-bottom: 0.5rem'>
                                <h6 class="card-title">{{ $search->lecture }}<span style="float: right;">( {{ $search->year }} )</span></h6>
                                <h7 class="card-subtitle mb-2 text-muted" style="font-size: small;">{{ $search->department }} {{ $search->teacher }}</h7>
                                <p class="card-text" style="font-size: small;">楽単度：@if($search->review_easy == 5) <span>★★★★★</span> @elseif($search->review_easy == 4) <span>★★★★</span> @elseif($search->review_easy == 3) <span>★★★</span> @elseif($search->review_easy == 2) <span>★★</span> @else <span>★</span> @endif</p>
                            </div>
                            <h7 class="accordion-header" id="heading{{ $search->id }}" style="border-top: 0.1px solid #dcdcdc;">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $search->id }}" aria-expanded="false" aria-controls="collapse{{ $search->id }}" style='padding: 0.3rem 1.25rem;font-size: small;'>
                                    学生のコメントを見る
                                </button>
                            </h7>
                            <div id="collapse{{ $search->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $search->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: small;">
                                    {{ $search->review_comment }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class='paginate d-grid gap-2 col-10 mx-auto'>
                            {{ $searchs -> appends(request()->query()) -> links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection