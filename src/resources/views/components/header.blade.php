<header>
    <div class="project-title">
        <a>My Movie Review</a>
    </div>

    <div class="project-logo">
        <img src="{{ asset('image/movie_film_logo.png') }}">
    </div>
    <br>

    @auth
        <div class="auth-logout">
            <ul>
                <li class="auth-name">
                    <a href="#">{{ Auth::user()->name }}</a><a> さん</a>
                </li>
                <li  class="logout-button">
                    <form method="POST" action="{{ route('logout') }}">
                        <button>{{ __('ログアウト') }}</button>
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @endauth



    @if(Auth::check())
        <nav>
            <ul class="gnav-navi-1">
                <li><a href="{{ route('reviewlist_index')}}">REVIEW LIST<br>レビュー一覧</a></li>
                <li><a href="{{ route('review') }}">REVIEW<br>投稿する</a></li>
                <li><a href="{{ route('review_search') }}">SEARCH<br>検索する</a></li>
                <li><a href="{{ route('contact_form') }}">CONTACT<br>お問合せ</a></li>
            </ul>
        </nav>
    @else
        <nav>
            <ul class="gnav-navi-1">
                <li><a href="{{ route('welcome') }}">TOP<br>トップ</a></li>
                <li><a href="{{ route('login') }}">LOGIN<br>ログイン</a></li>
                <li><a href="{{ route('register') }}">REGISTER<br>新規登録</a></li>
                <li><a href="{{ route('contact_form') }}">CONTACT<br>お問合せ</a></li>
            </ul>
        </nav>
    @endif

</header>
