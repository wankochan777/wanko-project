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
        <tr>
          <td>田中</td>
          <td>27</td>
        </tr>
        <tr>
          <td>佐藤</td>
          <td>42</td>
        </tr>
    </table>
</article>
@endsection
