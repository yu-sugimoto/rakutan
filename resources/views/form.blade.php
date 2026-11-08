@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
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

            <!-- Content Label -->
            <div class="content-label">
                <i class="bi bi-pencil-square"></i>
                授業レビューを投稿する
            </div>

            <!-- Review Content -->
            <div class="review-content">
                <!-- Step Indicator -->
                <div class="step text-center">
                    <div class="step-box aria-current">
                        <i class="bi bi-1-circle me-1"></i><span>入力</span>
                    </div>
                    <div class="step-box">
                        <i class="bi bi-2-circle me-1"></i><span>確認</span>
                    </div>
                    <div class="step-box">
                        <i class="bi bi-3-circle me-1"></i><span>完了</span>
                    </div>
                </div>

                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Form -->
                <form class="needs-validation" action="{{ route('review.check') }}" method="post" novalidate>
                    @csrf
                    <div class="review-form">
                        <!-- Department -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-building me-1"></i>学部名
                            </label>
                            <select class="form-select" name="department" required>
                                <option value="">プルダウンから選択</option>
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
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle me-1"></i>学部名を選択してください
                            </div>
                        </div>

                        <!-- Lecture -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-book me-1"></i>受講講義
                            </label>
                            <input class="form-control" type="text" name="lecture" pattern="^\S*$" required placeholder="講義名を入力（スペース禁止）">
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle me-1"></i>受講講義を入力してください（スペース禁止）
                            </div>
                        </div>

                        <!-- Year -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-calendar-event me-1"></i>受講年度
                            </label>
                            <select class="form-select" name="year" required>
                                <option value="">プルダウンから選択</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle me-1"></i>受講年度を選択してください
                            </div>
                        </div>

                        <!-- Teacher -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-person me-1"></i>先生名
                            </label>
                            <input class="form-control" type="text" name="teacher" pattern="^\S*$" required placeholder="先生名を入力（スペース禁止）">
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle me-1"></i>先生名を入力してください（スペース禁止）
                            </div>
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
                            <div class="rate-form">
                                <input class="form-check-input" id="star5" type="radio" name="review_easy" value="5" required>
                                <label for="star5">★</label>
                                <input class="form-check-input" id="star4" type="radio" name="review_easy" value="4" required>
                                <label for="star4">★</label>
                                <input class="form-check-input" id="star3" type="radio" name="review_easy" value="3" required>
                                <label for="star3">★</label>
                                <input class="form-check-input" id="star2" type="radio" name="review_easy" value="2" required>
                                <label for="star2">★</label>
                                <input class="form-check-input" id="star1" type="radio" name="review_easy" value="1" required>
                                <label for="star1">★</label>
                                <div class="invalid-feedback" style="direction: ltr;">
                                    <i class="bi bi-exclamation-circle me-1"></i>楽単度を選択してください
                                </div>
                            </div>
                        </div>

                        <!-- Comment -->
                        <div class="setting-area">
                            <label class="form-label">
                                <i class="bi bi-chat-left-text me-1"></i>コメント
                            </label>
                            <textarea class="form-control" name="review_comment" placeholder="後輩に向けてコメントをお願いします！" required></textarea>
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle me-1"></i>コメントを入力して下さい
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="setting-area">
                            <div class="d-grid gap-2 col-md-8 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-arrow-right-circle me-1"></i>確認画面へ
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
        // 検証エラーで戻ったときに入力内容を復元する
        const oldInput = @json(session()->getOldInput());
        ['department', 'lecture', 'year', 'teacher', 'review_comment'].forEach((name) => {
            if (oldInput[name] !== undefined && oldInput[name] !== null) {
                document.querySelector(`[name="${name}"]`).value = oldInput[name];
            }
        });
        const rating = document.querySelector(`input[name="review_easy"][value="${oldInput.review_easy}"]`);
        if (rating) {
            rating.checked = true;
        }

        const forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>
