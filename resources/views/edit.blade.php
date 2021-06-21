@extends('layouts.app')

@section('content')
<div class="twitter-container">

    <div class="card">
        @if (session('status'))
        <div class="" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="card-header">
            twitter登録
        </div>

        <form action="{{ route('update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- TwitterID --}}

                <label for="twitter_id" class="twitter-text">TwitterID</label>
                <input type="text"
                    class="twitter-form {{ $errors->has('twitter_id') ? 'is-invalid' : '' }}"
                    id="twitter_id" name="twitter_id" value="{{ old('twitter_id', $user->twitter_id) }}">
                @if ($errors->has('twitter_id'))
                    <div class="">
                        <strong>{{ $errors->first('twitter_id') }}</strong>
                    </div>
                @endif

            <div class="">
                <button type="submit" class="twitter-btn"><i class="far fa-save"></i>
                    更新</button>
            </div>
        </form>

    </div>

</div>
@endsection
