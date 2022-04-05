@extends('layouts.main')

@section('title','レビュー一覧')

@section('content')
<article>
    <table class="review-list" align="center" >
        <tr>
            <th>画像</th>
            <th>タイトル</th>
            <th>ふりがな</th>
            <th>俳優</th>
            <th>ジャンル</th>
            <th>星評価</th>
            <th>コメント</th>
        </tr>
        @foreach($review_list as $list)
        <tr>
            <td><img src="{{ asset('public/image/XhdB9BGUjMViGLzmf3aK5fa441Ee6HH9Xaqj9lOl.jpg') }}"></td>
            <td>{{ Str::limit($list->title, 40, '...') }}</td>
            <td>{{ Str::limit($list->title_cana, 40, '...') }}</td>
            <td>{{ Str::limit($list->actor, 20, '...') }}</td>
            <td>{{ $list->genre }}</td>
            <td><span class="star5_rating" data-rate="{{ number_format($list->rating, 1) }}"></span></td>
            <td>{{ Str::limit($list->comment, 45, '...') }}</td>
            <td><a href="{{ route('review_edit',['id' => $list->id ])}}">編集・削除</a></td>
        </tr>
        @endforeach
    </table>
    <div class="paginate-position">{{ $review_list->withQueryString()->links('components.pagenation') }}</div>
</article>
@endsection
