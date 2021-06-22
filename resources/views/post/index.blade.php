@extends('layouts.app')

@section('content')
<div class="gallery-container">
    <div class="gallery-title">
        <h2>gallery</h2>
    </div>
    <div class="gallery-main">
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="flex-center flex-clear">
            <div class="card">
                <div class="card-header">
                    {{ $post->user->name }}
                    <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                </div>
                <div class="gallery-link">
                        <a href="{{ $post->work_url }}" target="_blank">サイト</a>
                        <a href="{{ $post->repo_url }}" target="_blank">リポジトリ</a>

                    @if ($post->user->twitter_id)
                        <a href="{{ $post->user->twitter_url }}"  target="_blank">Twitter</a>
                    @endif

                    <a href="{{ route('comments.index', $post) }}" >
                        コメントをする
                    </a>

                </div>
            </div>
            <div class="gallery-comment">
                <p>{!! nl2br(e($post->comment)) !!}</p>
            </div>
        </div>
        @endforeach
        @else
            <p>まだポートフォリオが登録されていません</p>
        @endif
    </div>
</div>
@endsection
