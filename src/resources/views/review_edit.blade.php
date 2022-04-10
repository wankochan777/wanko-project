@extends('layouts.main')

@section('title','編集')

@section('content')
<article>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="menu-container">
            <h2 class="menu-title">レビュー編集</h2>
            <ul class="varidation">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <br>
            <div class="form">
                <a>タイトル</a>
                <input type="text" name="title" value="{{ $review_edit->title }}" placeholder="映画のタイトル名をご記入ください。">
            </div>
            <div class="form">
                <a>ふりがな</a>
                <input type="text" name="title_cana" value="{{ $review_edit->title_cana }}" placeholder="映画のタイトル名をひらがなでご記入ください。">
            </div>
            <div class="form">
                <a>俳優</a>
                <input type="text" name="actor" value="{{ $review_edit->actor }}" placeholder="俳優名をご記入ください。">
            </div>
            <div class="form">
                <a>画像</a>
                @if($review_edit->image == null)
                    <input type="file" accept="image/*" name="image">
                @else
                    <img src="{{ asset('storage/' . $review_edit->image) }}" width=90px height=120px class="upload-img">
                    <div class="edit-img">
                        <label for="file_upload">
                        ファイルを変更する
                        <input type="file" accept="image/*" id="file_upload" name="image" >
                    </div>
                @endif
            </div>
            <div class="form">
                <a>ジャンル</a>
                <select id="search_series" name="genre">
                    <option value="">--ジャンルを選択してください--</option>
                    @foreach($genre_question as $key => $value)
                        <option value="{{ $value }}" @if($review_edit->genre == $value) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form">
                <a>星評価</a>
                <div class="stars">
                    <span>
                        @for($i=5; $i>0; $i--)
                        <input id="review.{{$i}}" type="radio" name="rating" value="{{$i}}"
                        @if(old('rating') == $i) checked @elseif($review_edit->rating == $i) checked @endif>
                        <label for="review.{{$i}}">★</label>
                        @endfor
                    </span>
                </div>
            </div>
            <div class="form">
                <a>コメント</a>
                <textarea name="comment" rows="10" placeholder="映画の感想等をご記入ください。">{{ $review_edit->comment }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ $user_id ?? '' }}">
            <input type="hidden" name="name" value="{{ $name ?? '' }}">
            <div class="btn">
                <input type="submit" name="delete" class="clear" value="削除">
                <input type="submit" name="send" class="submit" value="上書き">
            </div>
        </div>
    </form>
</article>
@endsection
