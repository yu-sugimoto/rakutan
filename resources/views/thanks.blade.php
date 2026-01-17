@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Content Label -->
            <div class="content-label">
                <i class="bi bi-pencil-square"></i>
                授業レビューを投稿する
            </div>

            <!-- Review Content -->
            <div class="review-content">
                <!-- Step Indicator -->
                <div class="step text-center">
                    <div class="step-box">
                        <i class="bi bi-1-circle me-1"></i><span>入力</span>
                    </div>
                    <div class="step-box">
                        <i class="bi bi-2-circle me-1"></i><span>確認</span>
                    </div>
                    <div class="step-box aria-current">
                        <i class="bi bi-3-circle me-1"></i><span>完了</span>
                    </div>
                </div>

                <!-- Thanks Message -->
                <div class="review-thanks" style="text-align: center;">
                    <div class="setting-area">
                        <div class="thanks-area">
                            <i class="bi bi-check-circle-fill me-2" style="font-size: 2rem;"></i><br>
                            ありがとうございます！<br>
                            授業評価を投稿しました！
                        </div>
                        <br>
                        <p class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            不適切なレビューと判断した場合削除されることがあります。
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="setting-area">
                        <div class="d-grid gap-2 col-md-8 mx-auto">
                            <a class="btn btn-primary" href="{{ route('review.form')}}">
                                <i class="bi bi-plus-circle me-1"></i>他の授業をレビューする
                            </a>
                        </div>
                    </div>
                    <div class="setting-area" style="padding-top: 0;">
                        <div class="d-grid gap-2 col-md-8 mx-auto">
                            <a class="btn btn-secondary" href="{{ route('index')}}">
                                <i class="bi bi-house-door me-1"></i>トップに戻る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
