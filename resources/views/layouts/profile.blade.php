<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-sacale=1"/>
        <title>WebpageCreate</title>
            
        <!-- CSRF Tokenn -->
        {{-- 後の章で説明します --}}
        <meat name="csrf-token" content="{{ csrf_token() }}">
            
        {{-- 各ページごとにtitleタグを入れるために、yieldで空けておきます。 --}}  
        <title>@yield('title')</title>
        
    　　<!-- Scriipts -->
        {{-- Laravelで標準で用意されているJavascriptを読み込みます。　--}}
        <script src="{{ secure_asset('js/app.js')}}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="http://fonts.gstatic/com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        {{--Laravelの標準で用意されているCSSを読み込みます。 --}}
        <link href="{{ secure_asset('css/app.css')}}" rel ="stylesheet">
        {{-- 後半で作成するCSSを読み込みます。 --}}
        <link href="{{ secure_asset('css/profile.css')}}" rel ="stylesheet">
    </head>
    <body>
        <h1>ウェブページ作成画面</h1>
        <div id="app">
            
            {{-- 画面上部に表示するナビゲーションバーです。　--}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <!-- Left Sid Of Navbar -->
                        <ul calss="navbar-nav mr-auto">
                        </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            {{-- 以下を追記 --}}
                            <!--Authentication Link-->
                            {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            {{-- ログインしていたらユーザー名とログアウトボタンの表示 --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="creat"></span>
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElemntById('logout-from').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        
                                        <from id="logout-form" action="{{ route('logout') }}.submit();">
                                            @csrf
                                        </from>
                                    </div>
                                </li>
                            @endguest    
                        </ul>
                    </div>
                </div>    
            </nav>
            {{-- ここまでナビゲーションバー　--}
            
            <main class="py-4">
                {{--　コンテンツを入れるため、@yieldで開けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>




