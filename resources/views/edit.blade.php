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

                    <form action="{{ route('update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- TwitterID --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="twitter_id">TwitterID</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('twitter_id') ? 'is-invalid' : '' }}"
                                    id="twitter_id" name="twitter_id" value="{{ old('twitter_id', $user->twitter_id) }}">
                                @if ($errors->has('twitter_id'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('twitter_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>
                                更新</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
