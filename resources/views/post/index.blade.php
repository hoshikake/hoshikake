@extends('layouts.app')

@section('content')
<div class="gallery-container">
    <div class="gallery-title">
        <h2>gallery</h2>
    </div>
    <div class="gallery-main">
        @if (count($posts) > 0)
            <div class="card">
                @foreach ($posts as $post)
                    <div class="card-header">
                        {{ $post->user->name }}
                    </div>
                    <div class="gallery-link">
                        <a href="{{ $post->work_url }}"  target="_blank"><p>ポートフォリオ</p></a>
                        <a href="{{ $post->repo_url }}"  target="_blank"><p>リポジトリ</p></a>
                        <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                        @if ($post->user->twitter_id)
                            <a href="{{ $post->user->twitter_url }}"  target="_blank">Twitter</a>
                        @else
                            <p>{{ $post->user->name }}</p>
                        @endif
                        <p class="gallery-comment">{!! nl2br(e($post->comment)) !!}</p>

                        <a href="{{ route('comments.index', $post) }}" >
                            <p>コメントをする</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>まだポートフォリオが登録されていません</p>
        @endif
    </div>
</div>
@endsection
