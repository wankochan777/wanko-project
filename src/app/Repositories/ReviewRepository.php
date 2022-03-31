<?php

namespace App\Repositories;

use App\Models\Users;
use Illuminate\Support\Facades\DB;

class ReviewRepository
{
    public function getReviewList($user_id) {
        return DB::table('review')
            ->select('id', 'title', 'title_cana', 'actor', 'rating', 'comment')
            ->where('user_id', $user_id)
            ->get();
    }

    public function getReviewEdit($id) {
        return DB::table('review')
            ->where('id', $id)
            ->first();
    }
}
