@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-link">
                    <label for="name" class="link-text">SNSログイン</label>
                    <div class="github-link">
                        <a href="{{ url('login/github') }}" class="btn btn-secondary">
                            <i class="fa fa-github">GitHub</i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
