@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <!-- Page Title -->
            <div class="ranking-header">
                <h2><i class="bi bi-award me-2"></i>学部別先生ランキング</h2>
                <p class="text-muted">各学部の先生を楽単度の平均スコアでランキング（先生別）</p>
            </div>

            <!-- Notice -->
            <div class="ranking-notice">
                <i class="bi bi-info-circle me-2"></i>
                このランキングは「楽単度」のみに焦点を当てたスコアです。先生の教育力や授業の質を評価するものではありません。
            </div>

            <!-- Department Navigation -->
            <div class="department-nav mb-4">
                <div class="department-nav-inner">
                    @foreach($departments as $index => $dept)
                        <a href="#dept-{{ $index }}" class="dept-link">{{ $dept }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Rankings by Department -->
            <div class="rankings-container">
                @foreach($departments as $index => $department)
                <div class="department-ranking" id="dept-{{ $index }}">
                    <div class="department-title">
                        <i class="bi bi-building me-2"></i>{{ $department }}
                    </div>
                    <div class="ranking-content">
                        @if($rankings[$department]->isEmpty())
                            <div class="no-data">
                                <i class="bi bi-inbox me-2"></i>データがありません
                            </div>
                        @else
                            <div class="ranking-list">
                                @foreach($rankings[$department] as $rank => $item)
                                <div class="ranking-item">
                                    <div class="rank-badge rank-{{ $rank + 1 }}">
                                        @if($rank == 0)
                                            <i class="bi bi-trophy-fill"></i>
                                        @elseif($rank == 1)
                                            <i class="bi bi-award-fill"></i>
                                        @elseif($rank == 2)
                                            <i class="bi bi-award"></i>
                                        @else
                                            {{ $rank + 1 }}
                                        @endif
                                    </div>
                                    <div class="rank-info">
                                        <div class="teacher-name-main">
                                            <i class="bi bi-person-fill me-1"></i>{{ $item->teacher }}
                                        </div>
                                    </div>
                                    <div class="rank-score">
                                        <div class="score-value">{{ number_format($item->avg_score, 2) }}</div>
                                        <div class="score-stars">
                                            <div class="stars-container">
                                                <div class="stars-empty">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                                <div class="stars-filled" style="width: {{ ($item->avg_score / 5) * 100 }}%;">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-count">
                                            <small class="text-muted">({{ $item->review_count }}件)</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @if($rankings[$department]->count() < 3)
                                    @for($i = $rankings[$department]->count(); $i < 3; $i++)
                                    <div class="ranking-item no-data-item">
                                        <div class="rank-badge rank-{{ $i + 1 }}">{{ $i + 1 }}</div>
                                        <div class="rank-info">
                                            <div class="text-muted"><i class="bi bi-dash-circle me-1"></i>データがありません</div>
                                        </div>
                                        <div class="rank-score">
                                            <div class="score-value text-muted">-</div>
                                        </div>
                                    </div>
                                    @endfor
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
