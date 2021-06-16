@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ポートフォリオ</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-3 mb-5">
                            <div class="card">
                                <div class="card-header">{{ $post->user->name }}</div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ $post->work_url }}" class="btn btn-primary" target="_blank">ポートフォリオ</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ $post->repo_url }}" class="btn btn-primary" target="_blank">リポジトリ</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                                            @if ($post->user->twitter_id )
                                                <a href="{{ $post->user->twitter_url }}" class="btn btn-primary" target="_blank">Twitter</a>
                                            @else
                                                <p>{{ $post->user->name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('posts.index') }}" class="btn btn-info">一覧に戻る</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">コメント</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($comments) > 0)
                        <div class="row">
                            @foreach ($comments as $comment)
                                <div class="col-3 mb-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <textarea cols="30" rows="10">{{ $comment->comment }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>コメントはまだありません。</p>
                    @endif

                    <p>コメントを投稿する</p>
                    <form action="{{ route('comments.store', $post) }}" method="post">
                        @csrf
                        <textarea name="comment" id="comment" cols="30" rows="10">{{ old('comment') }}</textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
