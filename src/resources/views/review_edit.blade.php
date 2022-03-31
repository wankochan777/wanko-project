@extends('layouts.main')

@section('title','評価編集・削除')

@section('content')
<article>
    <form method="POST" action="{{ route('review_edit', ['id' => $id]) }}">
        @csrf
        <div class="review-format">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <br>
                <li>タイトル</li>
                <li><input type="text" name="title" class="review-text" value="{{ $review_edit->title }}"></li>
                <br>
                <li>タイトルふりがな</li>
                <li><input type="text" name="title_cana" class="review-text" value="{{ $review_edit->title_cana }}"></li>
                <br>
                <li>主演俳優</li>
                <li><input type="text" name="actor" class="review-text" value="{{ $review_edit->actor }}"></li>
                <br>
                <li>
                    <div class="stars">
                        <span>
                            @for($i=5; $i>0; $i--)
                            <input id="review.{{$i}}" type="radio" name="rating" value="{{$i}}"
                            @if(old('rating') == $i) checked @elseif($review_edit->rating == $i) checked @endif>
                            <label for="review.{{$i}}">★</label>
                            @endfor
                        </span>
                    </div>
                </li>
                <br>
                <li>コメント</li>
                <li><textarea name="comment" class="review-comment">{{ $review_edit->comment }}</textarea></li>
                <br>
                <li><input type="hidden" name="user_id" value="{{ $user_id ?? '' }}"></li>
                <li><input type="hidden" name="name" value="{{ $name ?? '' }}"></li>
                <div>
                <li><input type="submit" name="delete" class="review-delete-button" value="削除"></li>
                <li><input type="submit" name="send" class="review-send-button" value="上書き"></li>
                </div>
            </ul>
        </div>
    </form>
</article>
@endsection
