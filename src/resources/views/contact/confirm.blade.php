@extends('layouts.main')

@section('title','お問い合わせ')

@section('content')
<article>
    <div class="menu-container">
        <h2 class="menu-title">お問い合わせの確認</h2>
        <form method="post" action="">
        @csrf
            <div class="form">
                <a>お名前 <span class="required">必須</span></a>
                {{ $contact_data['name'] }}
            </div>
            <div class="form">
                <a>メールアドレス <span class="required">必須</span></a>
                {{ $contact_data['mail'] }}
            </div>
            <div class="form">
                <a>電話番号</a>
                {{ $contact_data['number'] }}

            </div>
            <div class="form">
                <a>お問い合わせ内容 <span class="required">必須</span></a>
                <a>{!! nl2br(e($contact_data['comment'])) !!}</a>
            </div>
            <div class="btn">
                <input type="submit" class="clear" name="back" value="戻る">
                <input type="submit" class="submit" name="send" value="送信">
            </div>
            <input name="name" value="{{ $contact_data['name'] }}" type="hidden">
            <input name="mail" value="{{ $contact_data['mail'] }}" type="hidden">
            <input name="number" value="{{ $contact_data['number'] }}" type="hidden">
            <input name="comment" value="{{ $contact_data['comment'] }}" type="hidden">
        </form>
    </div>
</article>
@endsection
