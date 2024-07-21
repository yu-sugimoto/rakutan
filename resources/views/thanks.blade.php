@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid col-sm-8">
            <div class="content-label" style="margin-top: 0.5rem;;">
                授業レビューを投稿する
            </div>
            <div class="review-content">
                <div class="step text-center">
                    <div class="step-box">
                        <span>入力</span>
                    </div>
                    <div class="step-box">
                        <span>確認</span>
                    </div>
                    <div class="step-box aria-current">
                        <span>完了</span>
                    </div>
                </div>
                <div class="review-thanks" style="text-align: center;">
                    <div class="setting-area">
                        <div class="thanks-area">
                            ありがとうございます！<br>
                            授業評価を投稿しました！
                        </div>
                        <br>
                        <p>
                            ※不適切なレビューと判断した場合削除されることがあります。
                        </p>
                    </div>
                    <div class="setting-area">
                        <div class="d-grid gap-2 col-10 mx-auto">
                            <a type="button" class="btn btn-primary" href="{{ route('review.form')}}">他の授業をレビューする</a>
                        </div>
                    </div>
                    <div class="setting-area" style="padding-top: 0;">
                        <div class="d-grid gap-2 col-10 mx-auto">
                            <a type="button" class="btn btn-primary" href="{{ route('index')}}">トップに戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection