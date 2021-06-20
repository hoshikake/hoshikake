@extends('layouts.app')

@section('content')
<div class="gallery-container">
    <div class="">
        <div class="">gallery</div>

        <div class="">
            @if (count($posts) > 0)
                <div class="">
                    @foreach ($posts as $post)
                         <div class="">
                            <div class="">{{ $post->user->name }}</div>

                                <div class="">

                                    <a href="{{ $post->work_url }}"  target="_blank">ポートフォリオ</a>

                                    <a href="{{ $post->repo_url }}"  target="_blank">リポジトリ</a>

                                    <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                                    @if ($post->user->twitter_id)
                                        <a href="{{ $post->user->twitter_url }}"  target="_blank">Twitter</a>
                                    @else
                                        <p>{{ $post->user->name }}</p>
                                    @endif


                                    <a href="{{ route('comments.index', $post) }}" >
                                        コメントをする
                                    </a>

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
@endsection
