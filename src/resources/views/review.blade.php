@extends('layouts.main')

@section('title','評価')

@section('content')
<article>
    <form method="POST" action="{{ route('review') }}">
        @csrf
        <br>
        <ul class="varidation">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="review-format">
            <ul>
                <li>タイトル</li>
                <li><input type="text" name="title" class="review-text" value="{{ old('title') }}"></li>
                <br>
                <li>タイトルふりがな</li>
                <li><input type="text" name="title_cana" class="review-text" value="{{ old('title_cana') }}"></li>
                <br>
                <li>主演俳優</li>
                <li><input type="text" name="actor" class="review-text" value="{{ old('actor') }}"></li>
                <br>
                <li>
                    <div class="stars">
                        <span>
                            @for($i=5; $i>0; $i--)
                            <input id="review.{{$i}}" type="radio" name="rating" value="{{$i}}"
                            @if(old('rating') == $i) checked @endif>
                            <label for="review.{{$i}}">★</label>
                            @endfor
                        </span>
                    </div>
                </li>
                <br>
                <li>コメント</li>
                <li><textarea name="comment" class="review-comment">{{ old('comment') }}</textarea></li>
                <br>
                <li><input type="hidden" name="user_id" value="{{ $id ?? '' }}"></li>
                <li><input type="hidden" name="name" value="{{ $name ?? '' }}"></li>
                <li><input type="submit" name="send" class="review-send-button" value="投稿する"></li>
            </ul>
        </div>
    </form>
</article>
@endsection
