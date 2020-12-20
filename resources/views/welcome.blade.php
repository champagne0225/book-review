@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Book Review</h1>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', '新規会員登録はコチラ', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection