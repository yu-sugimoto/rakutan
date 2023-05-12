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
                    <div class="step-box aria-current">
                        <span>確認</span>
                    </div>
                    <div class="step-box">
                        <span>完了</span>
                    </div>
                </div>
                <form class="needs-validation" action="{{ route('review.thanks') }}" method="post">
                    @csrf
                    <div class="review-form">
                        <div class="setting-area">
                            <label class="form-label">学部名</label>
                            <div class="form-control-plaintext">
                                {{ $inputs['department'] }}
                            </div>
                            <input type="hidden" name="department" value="{{ $inputs['department'] }}">
                        </div>
                        <div class="setting-area">
                            <label class="form-label">受講講義</label>
                            <div class="form-control-plaintext">
                                {{ $inputs['lecture'] }}
                            </div>
                            <input type="hidden" name="lecture" value="{{ $inputs['lecture'] }}">
                        </div>
                        <div class="setting-area">
                            <label class="form-label">受講年</label>
                            <div class="form-control-plaintext">
                                {{ $inputs['year'] }}
                            </div>
                            <input type="hidden" name="year" value="{{ $inputs['year'] }}">
                        </div>
                        <div class="setting-area">
                            <label class="form-label">先生名</label>
                            <div class="form-control-plaintext">
                                {{ $inputs['teacher'] }}
                            </div>
                            <input type="hidden" name="teacher" value="{{ $inputs['teacher'] }}">
                        </div>
                        <div class="setting-area" id="review_easy">
                            <label class="form-label">楽単度</label>
                            <p>
                                ※評価の規準<br>
                                星５つ・・・楽すぎ、もう一度取りたい<br>
                                星４つ・・・まあまあ楽、取ってもいい<br>
                                星３つ・・・どちらともいえない、取ってもいい<br>
                                星２つ・・・ちょいムズ、取りたいと思わない<br>
                                星１つ・・・激ムズ、二度と取らない<br>
                            </p>
                            <div class="rate-form-check">
                                <input class=" form-check-input" id="star5" type="radio" name="review_easy" value="5">
                                <label for="star5">★</label>
                                <input class="form-check-input" id="star4" type="radio" name="review_easy" value="4">
                                <label for="star4">★</label>
                                <input class="form-check-input" id="star3" type="radio" name="review_easy" value="3">
                                <label for="star3">★</label>
                                <input class="form-check-input" id="star2" type="radio" name="review_easy" value="2">
                                <label for="star2">★</label>
                                <input class="form-check-input" id="star1" type="radio" name="review_easy" value="1">
                                <label for="star1">★</label>
                                <input type="hidden" name="review_easy" value="{{ $inputs['review_easy'] }}">
                            </div>
                        </div>
                        <div class="setting-area">
                            <label class="form-label">コメント</label>
                            <div class="form-control-plaintext">
                                {{ $inputs['review_comment'] }}
                            </div>
                            <input type="hidden" name="review_comment" value="{{ $inputs['review_comment'] }}">
                        </div>
                        <div class="setting-area">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="submit" name="action" class="btn btn-primary" value="submit">投稿する</button>
                            </div>
                        </div>
                        <div class="setting-area" style="padding-top: 0;">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="button" name="action" class="btn btn-primary" value="back" onclick="history.back()">戻る</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <div class='advertisement'>
                <a href="https://px.a8.net/svt/ejp?a8mat=3T8P7H+8ZAE9E+41NC+5ZMCH" rel="nofollow">
                    <img border="0" width="300" height="250" alt="" src="https://www26.a8.net/svt/bgt?aid=230513309543&wid=001&eno=01&mid=s00000018876001006000&mc=1"></a>
                <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=3T8P7H+8ZAE9E+41NC+5ZMCH" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll('.form-check-input');
        Array.prototype.slice.call(stars).forEach((star) => {
            if (star.value != "{{ $inputs['review_easy'] }}") {
                star.setAttribute('disabled', true);
            } else {
                star.setAttribute('checked', true);
            }
        });
    });
</script>