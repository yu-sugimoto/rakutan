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
                    <div class="step-box aria-current">
                        <i class="bi bi-2-circle me-1"></i><span>確認</span>
                    </div>
                    <div class="step-box">
                        <i class="bi bi-3-circle me-1"></i><span>完了</span>
                    </div>
                </div>

                <!-- Confirmation Form -->
                <form class="needs-validation" action="{{ route('review.thanks') }}" method="post">
                    @csrf
                    <div class="review-form">
                        <!-- Department -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-building me-1"></i>学部名
                            </label>
                            <div class="form-control-plaintext">
                                {{ $inputs['department'] }}
                            </div>
                            <input type="hidden" name="department" value="{{ $inputs['department'] }}">
                        </div>

                        <!-- Lecture -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-book me-1"></i>受講講義
                            </label>
                            <div class="form-control-plaintext">
                                {{ $inputs['lecture'] }}
                            </div>
                            <input type="hidden" name="lecture" value="{{ $inputs['lecture'] }}">
                        </div>

                        <!-- Year -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-calendar-event me-1"></i>受講年度
                            </label>
                            <div class="form-control-plaintext">
                                {{ $inputs['year'] }}
                            </div>
                            <input type="hidden" name="year" value="{{ $inputs['year'] }}">
                        </div>

                        <!-- Teacher -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-person me-1"></i>先生名
                            </label>
                            <div class="form-control-plaintext">
                                {{ $inputs['teacher'] }}
                            </div>
                            <input type="hidden" name="teacher" value="{{ $inputs['teacher'] }}">
                        </div>

                        <!-- Rating -->
                        <div class="setting-area" id="review_easy">
                            <label class="form-label">
                                <i class="bi bi-star me-1"></i>楽単度
                            </label>
                            <p>
                                <strong>評価の基準</strong><br>
                                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i> 楽すぎ、もう一度取りたい<br>
                                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star text-muted"></i> まあまあ楽、余裕があれば取る<br>
                                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star text-muted"></i><i class="bi bi-star text-muted"></i> どちらともいえない、取ってもいい<br>
                                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star text-muted"></i><i class="bi bi-star text-muted"></i><i class="bi bi-star text-muted"></i> ちょいムズ、取りたいと思わない<br>
                                <i class="bi bi-star-fill text-warning"></i><i class="bi bi-star text-muted"></i><i class="bi bi-star text-muted"></i><i class="bi bi-star text-muted"></i><i class="bi bi-star text-muted"></i> 激ムズ、二度と取らない
                            </p>
                            <div class="rate-form-check">
                                <input class="form-check-input" id="star5" type="radio" name="review_easy" value="5">
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

                        <!-- Comment -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-chat-left-text me-1"></i>コメント
                            </label>
                            <div class="form-control-plaintext">
                                {{ $inputs['review_comment'] }}
                            </div>
                            <input type="hidden" name="review_comment" value="{{ $inputs['review_comment'] }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="setting-area">
                            <div class="d-grid gap-2 col-md-8 mx-auto">
                                <button type="submit" name="action" class="btn btn-primary" value="submit">
                                    <i class="bi bi-send me-1"></i>投稿する
                                </button>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="setting-area" style="padding-top: 0;">
                            <div class="d-grid gap-2 col-md-8 mx-auto">
                                <button type="button" name="action" class="btn btn-secondary" value="back" onclick="history.back()">
                                    <i class="bi bi-arrow-left me-1"></i>戻る
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
