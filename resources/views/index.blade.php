@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid col-sm-7">
            <div class="university">
                <h5>関西学院大学 - 楽単発見器</h5>
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
                            </div>
                            <div class='setting-area' style='padding: 0.2rem 1rem'>
                                <label for="lecture-label">授業名</label>
                                <input class="form-control" type="text" name="lecture" id="lecture-label">
                            </div>
                            <div class='setting-area' style='padding: 0.2rem 1rem'>
                                <label for="teacher-label">先生名</label>
                                <input class="form-control" type="text" name="teacher" id="teacher-label">
                            </div>
                            <div class="d-grid gap-2 col-10 mx-auto" style='padding-top: 0.8rem'>
                                <input type='submit' class="btn btn-primary" value="検索">
                            </div>
                        </form>
                    </div>
                </div>
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