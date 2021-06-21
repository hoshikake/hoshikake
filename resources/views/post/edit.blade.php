@extends('layouts.app')

@section('content')
<div class="site-container">
    <div class="card">
        <div class="card-header">
            サイト登録
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="site-form"　action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- ポートフォリオURL --}}
            <label for="work_url">サイトURL</label>
            <input type="text"
                class="site-form-text"
                id="work_url" name="work_url"
                value="{{ old('work_url', $post->work_url) }}">
            @if ($errors->has('work_url'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('work_url') }}</strong>
                </div>
            @endif

            {{-- リポジトリURL --}}
            <label for="repo_url">リポジトリURL</label>
            <input type="text"
                class="site-form-text"
                id="repo_url" name="repo_url"
                value="{{ old('repo_url', $post->repo_url) }}">
            @if ($errors->has('repo_url'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('repo_url') }}</strong>
                </div>
            @endif

            {{-- コメント --}}

            <label class="site-comment" for="comment">コメント</label>
            <textarea class="site-textarea"
                id="comment" name="comment" rows="3">{{ old('comment', $post->comment) }}</textarea>
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('comment') }}</strong>
                </div>
            @endif

            <div class="flex-center">
                <div class="icheck-primary site-checkbox">
                    <input type="checkbox" name="is_published" id="is_published" @if($post->is_published) checked @endif>
                    <label for="is_published">公開する</label>
                </div>
                <div class="site-btns">
                    <button type="submit" class="site-btn">
                        <i class="far fa-save"></i>更新
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
