@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('admin.profile.index') }}">プロフィール一覧</a>
                    <a href="{{ route('admin.news.index') }}">ニュース一覧</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
