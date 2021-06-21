@extends('layouts.app')

@section('content')
<div class="site-container">
    <div class="card">
        <div class="card-header">
            サイト登録
        </div>

        @if (session('status'))
            <div class="" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            {{-- ポートフォリオURL --}}
                    <label for="work_url">ポートフォリオURL</label>
                    <input type="text"
                        class="form-control {{ $errors->has('work_url') ? 'is-invalid' : '' }}"
                        id="work_url" name="work_url"
                        value="{{ old('work_url') }}">
                    @if ($errors->has('work_url'))
                        <div class="">
                            <strong>{{ $errors->first('work_url') }}</strong>
                        </div>
                    @endif

            {{-- リポジトリURL --}}

                    <label for="repo_url">リポジトリURL</label>
                    <input type="text"
                        class="form-control {{ $errors->has('repo_url') ? 'is-invalid' : '' }}"
                        id="repo_url" name="repo_url"
                        value="{{ old('repo_url') }}">
                    @if ($errors->has('repo_url'))
                        <div class="">
                            <strong>{{ $errors->first('repo_url') }}</strong>
                        </div>
                    @endif


            {{-- コメント --}}
                    <label for="comment">コメント</label>
                    <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                        id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
                    @if ($errors->has('comment'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </div>
                    @endif

                    <div class="icheck-primary">
                        <input type="checkbox" name="is_published" id="is_published">
                        <label for="is_published">公開する</label>
                    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="far fa-save"></i>更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
