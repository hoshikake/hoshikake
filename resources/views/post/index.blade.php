@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ギャラリー</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($posts) > 0)
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-3 mb-5">
                                    <div class="card">
                                        <div class="card-header">{{ $post->user->name }}</div>

                                        <div class="card-body">
                                            <a href="{{ $post->work_url }}" class="btn btn-primary">ポートフォリオ</a>
                                            <a href="{{ $post->repo_url }}" class="btn btn-primary">リポジトリ</a>

                                            <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">

                                            @if ($post->user->twitter_id )
                                                <a href="{{ $post->user->twitter_url }}" class="btn btn-primary">Twitter</a>
                                            @else
                                                <p>{{ $post->user->name }}</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                    <p>まだポートフォリオが登録されていません</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
