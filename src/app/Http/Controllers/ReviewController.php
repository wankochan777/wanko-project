<?php

namespace App\Http\Controllers;

use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $review_repository;

    public function __construct(ReviewRepository $review_repository)
    {
        $this->review_repository = $review_repository;
    }

    // 投稿一覧
    public function reviewlist_index(Request $request)
    {
        if($request) {
            $review_list = $this->review_repository->getReviewSearchList(Auth::user()->id, $request->title, $request->title_cana, $request->actor, $request->rating, $request->genre);
        } else {
            $review_list = $this->review_repository->getReviewAllList(Auth::user()->id);
        }

        return view('review_list.index',[
            'review_list' => $review_list,
        ]);
    }

    // 投稿する
    public function review()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $genre_question = array(
            '1' => 'アクション',
            '2' => 'SF',
            '3' => 'アドベンチャー',
            '4' => 'ファンタジー',
            '5' => 'ホラー',
            '6' => 'サスペンス',
            '7' => 'ミステリー',
            '8' => '戦争',
            '9' => 'コメディ',
            '10' => '恋愛',
            '11' => 'ファミリー',
            '12' => 'ミュージカル',
            '13' => 'アニメ',
            '14' => 'ドキュメンタリー',
            '15' => 'ドラマ',
            '16' => '歴史',
            '17' => 'その他',
        );

        return view('review', [
            'id' => $id,
            'name' => $name,
            'genre_question' => $genre_question,
        ]);
    }

    // 投稿後DBに書き込み
    public function review_send(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'title_cana' => 'required',
            'actor' => 'required',
            'genre' => 'required',
            'rating'  => 'required',
            'comment' => 'required|min:3',
            ],
            [
            'title.required'  => '※タイトルは必須です',
            'title_cana.required' => '※ふりがなは必須です',
            'actor.required' => '※俳優は必須です',
            'genre.required' => '※ジャンルは必須です',
            'rating.required'  => '※星評価は必須です',
            'comment.required'  => '※コメントは必須です',
            'comment.required|min:3'  => '※コメントは3文字以上にしてください',
            ]
        );

        DB::table('review')->insert(
            [
            'user_id' => $request->user_id,
            'name' => $request->name,
            'image' => $request->image->store('public/image'),
            'rating' => $request->rating,
            'actor' => $request->actor,
            'genre' => $request->genre,
            'title' => $request->title,
            'title_cana' => $request->title_cana,
            'comment' => $request->comment,
            'c_stamp' => now(),
            ]
        );

        $request->session()->regenerateToken();

        return redirect()->route('reviewlist_index');
    }

    // 投稿の編集・削除
    public function review_edit($id)
    {
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $review_edit = $this->review_repository->getReviewEdit($id);
        $genre_question = array(
            '1' => 'アクション',
            '2' => 'SF',
            '3' => 'アドベンチャー',
            '4' => 'ファンタジー',
            '5' => 'ホラー',
            '6' => 'サスペンス',
            '7' => 'ミステリー',
            '8' => '戦争',
            '9' => 'コメディ',
            '10' => '恋愛',
            '11' => 'ファミリー',
            '12' => 'ミュージカル',
            '13' => 'アニメ',
            '14' => 'ドキュメンタリー',
            '15' => 'ドラマ',
            '16' => '歴史',
            '17' => 'その他',
        );

        return view('review_edit', [
            'review_edit' => $review_edit,
            'user_id' => $user_id,
            'name' => $name,
            'id' => $id,
            'genre_question' => $genre_question,
        ]);
    }

    // 投稿の編集・削除をDBに反映
    public function review_edit_send(Request $request)
    {
        if($request->delete) {
            DB::table('review')
            ->where('user_id', $request->user_id)
            ->where('id', $request->id)
            ->delete();
        } else {
            $request->validate([
                'title' => 'required',
                'title_cana' => 'required',
                'actor' => 'required',
                'genre' => 'required',
                'rating'  => 'required',
                'comment' => 'required|min:3',
                ],
                [
                'title.required'  => '※タイトルは必須です',
                'title_cana.required' => '※ふりがなは必須です',
                'actor.required' => '※俳優は必須です',
                'genre.required' => '※ジャンルは必須です',
                'rating.required'  => '※星評価は必須です',
                'comment.required'  => '※コメントは必須です',
                'comment.required|min:3'  => '※コメントは3文字以上にしてください',
                ]
            );

            DB::table('review')->updateOrInsert(
                [
                'user_id' => $request->user_id,
                'id' => $request->id,
                ],
                [
                'user_id' => $request->user_id,
                'id' => $request->id,
                'title' => $request->title,
                'title_cana' => $request->title_cana,
                'actor' => $request->actor,
                'genre' => $request->genre,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'c_stamp' => now(),
                ]
            );
        }

        return redirect()->route('reviewlist_index');
    }

    public function review_search()
    {
        $genre_question = array(
            '1' => 'アクション',
            '2' => 'SF',
            '3' => 'アドベンチャー',
            '4' => 'ファンタジー',
            '5' => 'ホラー',
            '6' => 'サスペンス',
            '7' => 'ミステリー',
            '8' => '戦争',
            '9' => 'コメディ',
            '10' => '恋愛',
            '11' => 'ファミリー',
            '12' => 'ミュージカル',
            '13' => 'アニメ',
            '14' => 'ドキュメンタリー',
            '15' => 'ドラマ',
            '16' => '歴史',
            '17' => 'その他',
        );

        return view('review_search', ['genre_question' => $genre_question]);
    }
}
