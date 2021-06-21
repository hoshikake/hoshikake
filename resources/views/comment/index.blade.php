@extends('layouts.app')

@section('content')
<div class="comment-top">
    <div class="comment-title">
        <p>
            comment
        </p>
    </div>
    <div class="card">
        <div class="card-header">
            {{ $post->user->name }}
            <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
        </div>
        <div class="comment-link">
            <a href="{{ $post->work_url }}" target="_blank">サイト</a>
            <a href="{{ $post->repo_url }}" target="_blank">リポジトリ</a>

            @if ($post->user->twitter_id )
            <a href="{{ $post->user->twitter_url }}" target="_blank">Twitter</a>
            @endif
            <a href="{{ route('posts.index') }}">一覧に戻る</a>
        </div>
    </div>
</div>

<div class="comment-container">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('comments.store', $post) }}" method="post">
            @csrf

            {{-- コメント --}}

            <label for="comment">コメント</label>
            <textarea class="" id="comment" name="comment" rows="3" required>{{ old('comment') }}</textarea>
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('comment') }}</strong>
                </div>
            @endif

            <div class="">
                <button type="submit" class="">
                    <i class="far fa-save"></i>投稿
                </button>
            </div>
            @if (count($comments) > 0)
                @foreach ($comments as $comment)
                    <form action="{{ route('comments.update', $comment) }}" method="post" class="form-update" data-id="{{ $comment->id }}">
                        @csrf
                        @method('PUT')
                    </form>
                    <div class="col border mb-1 comment-wrapper" data-id="{{ $comment->id }}">

                        <p class="comment">{!! nl2br(e($comment->comment)) !!}</p>
                        <img src="{{ $comment->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                        @if ($comment->user->twitter_id)
                            <a href="{{ $comment->user->twitter_url }}" class="btn btn-sm btn-primary" target="_blank">{{ $post->user->name }}</a>
                        @endif
                        @if ($comment->user->id === Auth::user()->id)
                            <button type="submit" class="btn btn-sm btn-primary btn-edit-comment">編集</button>
                        @endif

                    </div>
                @endforeach
            @else
                <p>コメントはまだありません。</p>
            @endif
        </form>
    </div>
</div>
<a href="{{ route('posts.index') }}" class="comment-btn">一覧に戻る</a>
@endsection

<!-- こめんとをぬるでおくるとエラー -->
<!-- Twitterのないときは何も表示しない -->
<!-- 編集効かない -->
<!-- できるコメントは一つ？？ -->
