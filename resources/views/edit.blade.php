@extends('layouts.app')

@section('content')
<div class="twitter-container">

    <div class="">ギャラリー</div>

    <div class="">
        @if (session('status'))
            <div class="" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- TwitterID --}}


                <label for="twitter_id">TwitterID</label>
                <input type="text"
                    class="form-control {{ $errors->has('twitter_id') ? 'is-invalid' : '' }}"
                    id="twitter_id" name="twitter_id" value="{{ old('twitter_id', $user->twitter_id) }}">
                @if ($errors->has('twitter_id'))
                    <div class="">
                        <strong>{{ $errors->first('twitter_id') }}</strong>
                    </div>
                @endif


            <div class="">
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>
                    更新</button>
            </div>
        </form>

    </div>

</div>
@endsection
