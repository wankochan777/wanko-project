@extends('layouts.main')

@section('title','検索')

@section('content')
<article>
    <div class="menu-container">
        <h2 class="menu-title">詳細検索</h2>
        <form method="get" action="{{ route('reviewlist_index') }}">
        @csrf
            <div class="form">
                <a>タイトル</a>
                <input type="search" name="title" value="">
            </div>
            <div class="form">
                <a>タイトルふりがな</a>
                <input type="search" name="title_cana" value="">
            </div>
            <div class="form">
                <a>主演俳優</a>
                <input type="search" name="actor" value="">
            </div>
            <div class="form">
                <a>星評価</a>
                <select id="search_series" name="rating">
                    <option value="">--選択してください--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="btn">
                <input type="reset" class="clear" value="クリア">
                <input type="submit" class="submit" value="検索">
            </div>
        </form>
    </div>
</article>
@endsection
