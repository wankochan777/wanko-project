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
                <input type="search" name="title" value="" placeholder="映画のタイトル名をご記入ください。">
            </div>
            <div class="form">
                <a>ふりがな</a>
                <input type="search" name="title_cana" value="" placeholder="映画のタイトル名をひらがなでご記入ください。">
            </div>
            <div class="form">
                <a>俳優</a>
                <input type="search" name="actor" value="" placeholder="俳優名をご記入ください。">
            </div>
            <div class="form">
                <a>ジャンル</a>
                <select id="search_series" name="genre">
                    <option value="">--ジャンルを選択してください--</option>
                    @foreach($genre_question as $key => $value)
                        <option value="{{ $value }}" @if(old('genre') == $value) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form">
                <a>星評価</a>
                <select id="search_series" name="rating">
                    <option value="">--星評価数を選択してください--</option>
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
