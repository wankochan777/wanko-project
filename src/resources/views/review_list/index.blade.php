@extends('layouts.main')

@section('title','レビュー一覧')

@section('content')
<article>
    <table class="review-list" align="center" >
        <tr>
          <th>タイトル</th>
          <th>ふりがな</th>
          <th>俳優</th>
          <th>ジャンル</th>
          <th>星評価</th>
          <th>コメント</th>
        </tr>
        @foreach($review_list as $list)
        <tr>
            <td>{{ $list->title }}</td>
            <td>{{ $list->title_cana }}</td>
            <td>{{ $list->actor }}</td>
            <td>{{ $list->genre }}</td>
            <td>{{ $list->rating }}</td>
            <td>{{ $list->comment }}</td>
            <td bgcolor="#dcdcdc"><a href="{{ route('review_edit',['id' => $list->id ])}}">編集</a></td>
        </tr>
        @endforeach
    </table>
    <div class="paginate-position">{{ $review_list->withQueryString()->links('components.pagenation') }}</div>
</article>
@endsection
