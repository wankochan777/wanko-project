@extends('layouts.main')

@section('title','お問い合わせ')

@section('content')
<article>
    <div class="menu-container">
        <h2 class="menu-title">お問い合わせ</h2>
        <form method="post" action="{{ route('contact_confirm') }}">
        @csrf
            <ul class="varidation">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            <br>
            <div class="form">
                <a>お名前 <span class="required">必須</span></a>
                <input type="search" name="name" value="{{ old('name') }}" placeholder="お名前">
            </div>
            <div class="form">
                <a>メールアドレス <span class="required">必須</span></a>
                <input type="search" name="mail" value="{{ old('mail') }}" placeholder="メールアドレス">
            </div>
            <div class="form">
                <a>電話番号</a>
                <input type="search" name="number" value="{{ old('number') }}" placeholder="電話番号">
            </div>
            <div class="form">
                <a>お問い合わせ内容 <span class="required">必須</span></a>
                <textarea name="comment" rows="10" placeholder="お問い合わせ内容をこちらにご記入ください。">{{ old('comment') }}</textarea>
            </div>
            <div class="btn">
                <input type="submit" class="submit" value="確認する">
            </div>
        </form>
    </div>
</article>
@endsection
