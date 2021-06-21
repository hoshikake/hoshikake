@extends('layouts.app')

@section('content')
<div class="site-container">
            <div class="card">
                <div class="card-header">ギャラリー</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- ポートフォリオURL --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="work_url">ポートフォリオURL</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('work_url') ? 'is-invalid' : '' }}"
                                    id="work_url" name="work_url"
                                    value="{{ old('work_url', $post->work_url) }}">
                                @if ($errors->has('work_url'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('work_url') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- リポジトリURL --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="repo_url">リポジトリURL</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('repo_url') ? 'is-invalid' : '' }}"
                                    id="repo_url" name="repo_url"
                                    value="{{ old('repo_url', $post->repo_url) }}">
                                @if ($errors->has('repo_url'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('repo_url') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- コメント --}}
                        <div class="form-group row">
                            <div class="col">
                                <label for="comment">コメント</label>
                                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                                    id="comment" name="comment" rows="3">{{ old('comment', $post->comment) }}</textarea>
                                @if ($errors->has('comment'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-7">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="is_published" id="is_published" @if($post->is_published) checked @endif>
                                    <label for="is_published">公開する</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="far fa-save"></i>更新
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
