@extends('layouts.main')

@section('title','評価一覧')

@section('content')
<article>
    <table class="review-list">
        <tr>
          <th>タイトル</th>
          <th>タイトルふりがな</th>
          <th>主演俳優</th>
          <th>星評価</th>
          <th>コメント</th>
        </tr>
        @foreach($review_list as $list)
        <tr>
          <td>{{ $list->title }}</td>
          <td>{{ $list->title_cana }}</td>
          <td>{{ $list->actor }}</td>
          <td>{{ $list->rating }}</td>
          <td>{{ $list->comment }}</td>
          <td><a href="{{ route('review_edit',['id' => $list->id ])}}">詳細</a></td>
        </tr>
        @endforeach

    </table>
</article>
@endsection
