@extends('layouts.main')

@section('title','投稿')

@section('content')
<article>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="menu-container">
            <h2 class="menu-title">レビュー投稿</h2>
            <ul class="varidation">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <br>
            <div class="form">
                <a>タイトル</a>
                <input type="text" id="user_name" name="title" value="{{ old('title') }}" placeholder="映画のタイトル名をご記入ください。">
            </div>
            <div class="form">
                <a>ふりがな</a>
                <input type="text" id="kana_name" name="title_cana" value="{{ old('title_cana') }}" placeholder="映画のタイトル名をひらがなでご記入ください。">
            </div>
            <script>
            $(function() {
                $.fn.autoKana('#user_name', '#kana_name', {
                    katakana : true  //true：カタカナ、false：ひらがな（デフォルト）
                });
            });
            </script>
            <div class="form">
                <a>俳優</a>
                <input type="text" name="actor" value="{{ old('actor') }}" placeholder="俳優名をご記入ください。">
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
                <a>画像</a>
                <input type="file" accept="image/*" name="image">
            </div>
            <div class="form">
                <a>星評価</a>
                <div class="stars">
                    <span>
                        @for($i=5; $i>0; $i--)
                        <input id="review.{{$i}}" type="radio" name="rating" value="{{$i}}"
                        @if(old('rating') == $i) checked @endif>
                        <label for="review.{{$i}}">★</label>
                        @endfor
                    </span>
                </div>
            </div>
            <div class="form">
                <a>コメント</a>
                <textarea name="comment" rows="10" placeholder="映画の感想等をご記入ください。">{{ old('comment') }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ $id ?? '' }}">
            <input type="hidden" name="name" value="{{ $name ?? '' }}">
            <div class="btn">
                <input type="submit" name="send" class="submit" value="投稿する">
            </div>
        </div>
    </form>
</article>
@endsection
