@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <!--最新の-->
            @if (!is_null($headline))
              <div class="row">
                <div class="headline col-md-10 mx-auto">
                  <div class="row">
                    <div class="col-md-6">
                      <p class="body mx-auto">{{ str_limit($headline->name, 650) }}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endif
        <div class="row">
          <div class="posts col-md-10 mx-auto">
            @foreach($posts as $post)
              <div class="post">
                <div class="row">
                  <div class="text col-md-8">
                    <div class="date">
                      {{ $post->updated_at->format('Y年m月d日') }}
                    </div>
                    <div class="name">
                      {{ str_limit($post->name, 150) }}
                    </div>
                    <div class="gender mt-3">
                      {{ str_limit($post->gender, 100) }}
                    </div>
                    <div class="hobby mt-3">
                      {{ str_limit($post->hobby, 1000) }}
                    </div>
                    <div class="introduction mt-3">
                      {{ str_limit($post->introduction, 2000)}}
                    </div>
                  </div>
                </div>
              </div>
              <hr color="#c0c0c0">
            @endforeach
          </div>
        </div>
    </div>
@endsection
