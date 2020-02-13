{{-- layouts/profile.blade.phpをよみこむ　　--}}
@extends('layouts.profile')

{{-- profile.blade.phpの@('title')にMy プロフィール'を埋め込むます' --}}
@section('title', 'My プロフィール編集')

{{-- profile.blade.php@yield('content')に以下のタグを埋め込みます　--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール編集</h2>
            </div>    
        </div>
    </div>
@endsection