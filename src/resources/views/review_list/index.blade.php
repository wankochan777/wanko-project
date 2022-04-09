@extends('layouts.main')

@section('title','レビュー一覧')

@section('content')
<article>
    <div class="review-list">
        @foreach($review_list as $list)
            <div class="list-content">
                <ul>
                    <li><a href="{{ route('review_edit',['id' => $list->id ])}}">
                        <img src="{{ asset('images/' . $list->image) }}" alt="" class="review-img" ></a></li>
                    <li><span class="star5_rating" data-rate="{{ number_format($list->rating, 1) }}"></span></li>
                    <li>{{ Str::limit($list->title, 30, '...') }}</li>
                    <li>{{ Str::limit($list->actor, 30, '...') }}</li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="paginate-position">{{ $review_list->withQueryString()->links('components.pagenation') }}</div>
</article>
@endsection
