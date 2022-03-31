<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ReviewRepository;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $review_repository;

    public function __construct(ReviewRepository $review_repository)
    {
        $this->review_repository = $review_repository;
    }

    // 投稿一覧
    public function reviewlist_index()
    {
        return view('review_list.index');
    }

    // 投稿するページ
    public function review()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;

        return view('review', [
            'id' => $id,
            'name' => $name,
        ]);
    }

    // 投稿後DBに書き込み
    public function review_send(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'title_cana' => 'required',
            'actor' => 'required',
            'rating'  => 'required',
            'comment' => 'required|min:3',
            ],
            [
            'title.required'  => '※タイトルは必須です',
            'title_cana.required' => '※タイトルふりがなは必須です',
            'actor.required' => '※主演俳優は必須です',
            'rating.required'  => '※星評価は必須です',
            'comment.required'  => '※コメントは必須です',
            'comment.required|min:3'  => '※コメントは3文字以上にしてください',
            ]
        );

        DB::table('review')->insert(
            [
            'user_id' => $request->user_id,
            'name' => $request->name,
            'rating' => $request->rating,
            'actor' => $request->actor,
            'title' => $request->title,
            'title_cana' => $request->title_cana,
            'comment' => $request->comment,
            'c_stamp' => now(),
            ]
        );

        $request->session()->regenerateToken();

        return redirect()->route('reviewlist_index');
    }
}
