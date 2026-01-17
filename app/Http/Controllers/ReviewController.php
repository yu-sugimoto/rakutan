<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        // 最新のレコード数＝最新のレコードのid
        $newid = Review::get()->count();
        return view('index', compact('newid'));
    }

    public function search(Request $request)
    {
        // 最新のレコード数＝最新のレコードのid
        // get()するとリスト型で取り出してしまうのでNG
        $newid = Review::get()->count();

        // 検索フォームに入力された値を取得
        $department = $request->input('department');
        $lecture = $request->input('lecture');
        $teacher = $request->input('teacher');
        $sort = $request->input('sort', 'year'); // デフォルトは受講年度順

        // DBからデータを取得するために探すための準備
        $query = Review::query();

        if (!empty($department)) {
            $query->where('department', 'LIKE', $department);
        }

        // "lecture", "teacher"は部分一致
        if (!empty($lecture)) {
            $query->where('lecture', 'LIKE', "%$lecture%");
        }

        if (!empty($teacher)) {
            $query->where('teacher', 'LIKE', "%$teacher%");
        }

        // レコード数を取得
        $count = $query->count();

        // ソート順を適用
        if ($sort === 'rakutan') {
            // 楽単度の降順でソート
            $searchs = $query->orderBy('review_easy', 'desc')->orderBy('year', 'desc')->paginate(10);
        } else {
            // デフォルト：受講年度の降順でソート
            $searchs = $query->orderBy('year', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('search', compact('count', 'newid', 'searchs', 'department', 'lecture', 'teacher', 'sort'));
    }

    public function form()
    {
        return view('form');
    }

    public function check(Request $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('check', [
            'inputs' => $inputs,
        ]);
    }

    public function thanks(Request $request)
    {
        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');

        if ($action !== 'submit') {
            return redirect()->route('review.check')->withInput($inputs);
        } else {

            $contact = new Review();
            $contact->fill($inputs);
            $contact->save();
            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();
            //送信完了ページのviewを表示
            return view('thanks');
        }
    }

    public function terms(){
        return view('terms');
    }

    public function privacy(){
        return view('privacy');
    }

    public function lectureRanking()
    {
        // 学部リスト
        $departments = [
            '神学部', '文学部', '社会学部', '法学部', '経済学部', '商学部',
            '理工学部', '総合政策学部', '人間福祉学部', '教育学部', '国際学部',
            '理学部', '工学部', '生命環境学部', '建築学部',
            'スポーツ健康科学プログラム事務局', '共通教育センター', 'キャリアセンター',
            '共通教育センター（情報科学科目）', '言語教育研究センター',
            '国際教育・協力センター（CIEC JEASP）', '教職教育研究センター（資格）',
            '教職教育研究センター（教職専門）', '国際教育・協力センター/CIEC',
            'キリスト教と文化研究センター', '日本語教育センター',
            'ハンズオン・ラーニングセンター', '国連・外交統括センター'
        ];

        $rankings = [];

        foreach ($departments as $department) {
            // 学部別に teacher × lecture の平均楽単スコアを計算
            $lectureRankings = Review::selectRaw('teacher, lecture, AVG(review_easy) as avg_score, COUNT(*) as review_count')
                ->where('department', $department)
                ->groupBy('teacher', 'lecture')
                ->orderByDesc('avg_score')
                ->limit(3)
                ->get();

            $rankings[$department] = $lectureRankings;
        }

        return view('ranking.lecture', compact('rankings', 'departments'));
    }

    public function teacherRanking()
    {
        // 学部リスト
        $departments = [
            '神学部', '文学部', '社会学部', '法学部', '経済学部', '商学部',
            '理工学部', '総合政策学部', '人間福祉学部', '教育学部', '国際学部',
            '理学部', '工学部', '生命環境学部', '建築学部',
            'スポーツ健康科学プログラム事務局', '共通教育センター', 'キャリアセンター',
            '共通教育センター（情報科学科目）', '言語教育研究センター',
            '国際教育・協力センター（CIEC JEASP）', '教職教育研究センター（資格）',
            '教職教育研究センター（教職専門）', '国際教育・協力センター/CIEC',
            'キリスト教と文化研究センター', '日本語教育センター',
            'ハンズオン・ラーニングセンター', '国連・外交統括センター'
        ];

        $rankings = [];

        foreach ($departments as $department) {
            // 学部別に teacher の平均楽単スコアを計算
            $teacherRankings = Review::selectRaw('teacher, AVG(review_easy) as avg_score, COUNT(*) as review_count')
                ->where('department', $department)
                ->groupBy('teacher')
                ->orderByDesc('avg_score')
                ->limit(3)
                ->get();

            $rankings[$department] = $teacherRankings;
        }

        return view('ranking.teacher', compact('rankings', 'departments'));
    }
}
