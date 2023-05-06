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

        // DBからデータを取得するために探すための準備
        $query = Review::query();

        if (!empty($department)) {
            $query->where('department', 'LIKE', $department);
        }

        if (!empty($lecture)) {
            $query->where('lecture', 'LIKE', $lecture);
        }

        if (!empty($teacher)) {
            $query->where('teacher', 'LIKE', "%$teacher%");
        }

        // レコード数を取得
        $count = $query->count();
        // 探してきたレコードをgetして変数に格納する
        $searchs = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('search', compact('count', 'newid', 'searchs', 'department', 'lecture', 'teacher'));
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
}
