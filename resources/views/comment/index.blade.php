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
                        @foreach ($comments as $comment)
                            <div class="row">
                                <div class="col mb-5">
                                    <p>{!! nl2br(e($comment->comment)) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>コメントはまだありません。</p>
                    @endif

                    <p>コメントを投稿する</p>
                    <form action="{{ route('comments.store', $post) }}" method="post">
                        @csrf

                        {{-- コメント --}}
                        <div class="form-group row">
                            <div class="col">
                                <label for="comment">コメント</label>
                                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                                    id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="far fa-save"></i>投稿
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
