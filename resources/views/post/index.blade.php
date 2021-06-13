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
                                        <div class="card-body">{{ $post->user->twitter_id }}</div>
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
