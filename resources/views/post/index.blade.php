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
                        <p>
                            <a href="{{ $post->work_url }}"  target="_blank">ポートフォリオ</a>
                        </p>
                        <p>
                            <a href="{{ $post->repo_url }}"  target="_blank">リポジトリ</a>
                        </p>
                        <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                        @if ($post->user->twitter_id)
                            <a href="{{ $post->user->twitter_url }}"  target="_blank">Twitter</a>
                        @else
                            <p>{{ $post->user->name }}</p>
                        @endif
                        <p class="gallery-comment">{!! nl2br(e($post->comment)) !!}</p>
                        <p>
                            <a href="{{ route('comments.index', $post) }}" >
                                コメントをする
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p>まだポートフォリオが登録されていません</p>
        @endif
    </div>
</div>
@endsection
