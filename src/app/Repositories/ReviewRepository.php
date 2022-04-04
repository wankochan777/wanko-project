<?php

namespace App\Repositories;

use App\Models\Users;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewRepository
{
    // 評価一覧
    public function getReviewAllList($user_id)
    {
        return DB::table('review')
            ->select('id', 'title', 'title_cana', 'image', 'actor', 'genre', 'rating', 'comment')
            ->where('user_id', $user_id)
            ->orderByRaw('CAST(title_cana as CHAR) asc')
            ->paginate(15);
    }

    // 評価一覧（絞り込み）
    public function getReviewSearchList($user_id, $title = null, $title_cana = null, $actor = null, $rating = null, $genre = null)
    {
        $query = DB::table('review')
            ->where('user_id', $user_id)
            ->orderByRaw('CAST(title_cana as CHAR) asc');

        if ($title != null) {
            $query->where('title', 'LIKE', "%$title%");
        }

        if ($title_cana != null) {
            $query->where('title_cana', 'LIKE', "%$title_cana%");
        }

        if ($actor != null) {
            $query->where('actor', 'LIKE', "%$actor%");
        }

        if ($rating != null) {
            $query->where('rating', $rating);
        }

        if ($genre != null) {
            $query->where('genre', $genre);
        }

        $review_list = $query->paginate(15);

        return $review_list;
    }

    // 編集・削除
    public function getReviewEdit($id)
    {
        return DB::table('review')
            ->where('id', $id)
            ->first();
    }


}
