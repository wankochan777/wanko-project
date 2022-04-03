@extends('layouts.main')

@section('title','検索')

@section('content')
<article>
    {{-- <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('reviewlist_index') }}">
        <input class="form-control my-2 mr-5" type="search" placeholder="ユーザー名を入力" name="title" value="">
        <div class="d-flex justify-content-center">
            <button class="btn btn-info my-2" type="submit">検索</button>
            <button class="btn btn-secondary my-2 ml-5">
                <a href="{{ route('review_search') }}" class="text-white">
                    クリア
                </a>
            </button>
        </div>
    </form> --}}

    <div class="search-content">
        <h2 class="detail-search">詳細検索</h2>
        <form method="get" action="{{ route('reviewlist_index') }}" class="search_container">
            <div class="search-form">
                <a>タイトル</a>
                <input type="search" name="title" value="">
            </div>
            <div class="search-form">
                <a>タイトルふりがな</a>
                <input type="search" name="title_cana" value="">
            </div>
            <div class="search-form">
                <a>主演俳優</a>
                <input type="search" name="actor" value="">
            </div>
            <div class="search-form">
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
            <div class="search-btn">
                <input type="reset" class="search-clear" value="クリア">
                <input type="submit" class="search-submit" value="検索">
            </div>
        </form>
    </div>
</article>
@endsection
