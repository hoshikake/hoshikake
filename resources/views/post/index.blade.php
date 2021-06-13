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

                    <div class="row">
                        <div class="col-3 mb-5">
                            <div class="card">
                                <div class="card-header">タイトル</div>
                                <div class="card-body">Twitter</div>
                            </div>
                        </div>
                        <div class="col-3 mb-5">
                            <div class="card">
                                <div class="card-header">タイトル</div>
                                <div class="card-body">Twitter</div>
                            </div>
                        </div>
                        <div class="col-3 mb-5">
                            <div class="card">
                                <div class="card-header">タイトル</div>
                                <div class="card-body">Twitter</div>
                            </div>
                        </div>
                        <div class="col-3 mb-5">
                            <div class="card">
                                <div class="card-header">タイトル</div>
                                <div class="card-body">Twitter</div>
                            </div>
                        </div>
                        <div class="col-3 mb-5">
                            <div class="card">
                                <div class="card-header">タイトル</div>
                                <div class="card-body">Twitter</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
