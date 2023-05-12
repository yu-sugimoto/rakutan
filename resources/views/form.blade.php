@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid col-sm-7">
            <div class="content-label" style="margin-top: 0.5rem;;">
                授業レビューを投稿する
            </div>
            <div class="review-content">
                <div class="step text-center">
                    <div class="step-box aria-current">
                        <span>入力</span>
                    </div>
                    <div class="step-box">
                        <span>確認</span>
                    </div>
                    <div class="step-box">
                        <span>完了</span>
                    </div>
                </div>
                <form class="needs-validation" action="{{ route('review.check') }}" method="post" novalidate>
                    @csrf
                    <div class="review-form">
                        <div class="setting-area">
                            <label class="form-label">学部名</label>
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
                            </select>
                            <div class="invalid-feedback">学部名を入力してください</div>
                        </div>
                        <div class="setting-area">
                            <label class="form-label">受講講義</label>
                            <input class="form-control" type="text" name="lecture" pattern=".*\S+.*" required>
                            <div class="invalid-feedback">受講講義を入力してください</div>
                        </div>
                        <div class="setting-area">
                            <label class="form-label">受講年</label>
                            <select class="form-select" name="year" required>
                                <option value="">プルダウンから選択</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            <div class="invalid-feedback">受講年を選択してください</div>
                        </div>
                        <div class="setting-area">
                            <label class="form-label">先生名</label>
                            <input class="form-control" type="text" name="teacher" pattern=".*\S+.*" required>
                            <div class="invalid-feedback">先生名を入力してください</div>
                        </div>
                        <div class="setting-area" id="review_easy">
                            <label class="form-label">楽単度</label>
                            <p>
                                ※評価の規準<br>
                                星５つ・・・楽すぎ、もう一度取りたい<br>
                                星４つ・・・まあまあ楽、余裕があれば取る<br>
                                星３つ・・・どちらともいえない、取ってもいい<br>
                                星２つ・・・ちょいムズ、取りたいと思わない<br>
                                星１つ・・・激ムズ、二度と取らない<br>
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
                                <div class="invalid-feedback" style="direction: ltr;">楽単度を選択してください</div>
                            </div>
                        </div>
                        <div class="setting-area">
                            <label class="form-label">コメント</label>
                            <textarea class="form-control" name="review_comment" placeholder="ここにコメントを入力して下さい" required></textarea>
                            <div class="invalid-feedback">コメントを入力して下さい</div>
                        </div>
                        <div class="setting-area">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="submit" class="btn btn-primary">確認画面へ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-5">
            <a href="https://px.a8.net/svt/ejp?a8mat=3T8P7H+8ZAE9E+41NC+5ZMCH" rel="nofollow">
                <img border="0" width="300" height="250" alt="" src="https://www26.a8.net/svt/bgt?aid=230513309543&wid=001&eno=01&mid=s00000018876001006000&mc=1"></a>
            <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=3T8P7H+8ZAE9E+41NC+5ZMCH" alt="">
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
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